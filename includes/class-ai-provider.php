<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_AI_Provider {

    private $option_key = 'hc_ai_settings';

    public function get_settings() {
        return wp_parse_args( get_option( $this->option_key, [] ), [
            'provider' => 'openai',
            'api_key'  => '',
            'model'    => 'gpt-4o-mini',
        ] );
    }

    public function save_settings( $data ) {
        update_option( $this->option_key, [
            'provider' => sanitize_text_field( $data['provider'] ?? 'openai' ),
            'api_key'  => sanitize_text_field( $data['api_key']  ?? '' ),
            'model'    => sanitize_text_field( $data['model']    ?? 'gpt-4o-mini' ),
        ] );
    }

    public function generate( $prompt ) {
        $s = $this->get_settings();
        if ( empty( $s['api_key'] ) ) return new WP_Error( 'no_key', 'API key girilmemiş.' );

        return $s['provider'] === 'gemini'
            ? $this->generate_gemini( $prompt, $s )
            : $this->generate_openai( $prompt, $s );
    }

    /* ---- OpenAI ---- */
    private function generate_openai( $prompt, $s ) {
        $resp = wp_remote_post( 'https://api.openai.com/v1/chat/completions', [
            'timeout' => 120,
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $s['api_key'],
            ],
            'body' => wp_json_encode( [
                'model'       => $s['model'],
                'temperature' => 0.8,
                'messages'    => [
                    [ 'role' => 'user', 'content' => $prompt ],
                ],
            ] ),
        ] );

        if ( is_wp_error( $resp ) ) return $resp;

        $code = wp_remote_retrieve_response_code( $resp );
        $data = json_decode( wp_remote_retrieve_body( $resp ), true );

        if ( $code !== 200 ) {
            $msg = $data['error']['message'] ?? 'OpenAI API hatası.';
            return new WP_Error( 'api_error', $msg );
        }

        return $data['choices'][0]['message']['content'] ?? '';
    }

    /* ---- Gemini ---- */
    private function generate_gemini( $prompt, $s ) {
        $url  = "https://generativelanguage.googleapis.com/v1beta/models/{$s['model']}:generateContent?key={$s['api_key']}";
        $resp = wp_remote_post( $url, [
            'timeout' => 90,
            'headers' => [ 'Content-Type' => 'application/json' ],
            'body'    => wp_json_encode( [
                'contents'         => [ [ 'role' => 'user', 'parts' => [ [ 'text' => $prompt ] ] ] ],
                'generationConfig' => [ 'temperature' => 0.8, 'maxOutputTokens' => 8192 ],
            ] ),
        ] );

        if ( is_wp_error( $resp ) ) return $resp;

        $code = wp_remote_retrieve_response_code( $resp );
        $data = json_decode( wp_remote_retrieve_body( $resp ), true );

        if ( $code !== 200 ) {
            $msg = $data['error']['message'] ?? 'Gemini API hatası.';
            return new WP_Error( 'api_error', $msg );
        }

        return $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
    }

    /* ---- OpenAI kullanım/kredi sorgula ---- */
    public function get_openai_usage() {
        $s = $this->get_settings();
        if ( empty( $s['api_key'] ) ) return new WP_Error( 'no_key', 'API key yok.' );

        $headers = [
            'Authorization' => 'Bearer ' . $s['api_key'],
            'Content-Type'  => 'application/json',
        ];

        // Kredi bakiyesi (eski hesaplar / free credits)
        $credit_resp = wp_remote_get( 'https://api.openai.com/dashboard/billing/credit_grants', [
            'timeout' => 15,
            'headers' => $headers,
        ] );

        // Bu ay harcama
        $today     = current_time( 'Y-m-d' );
        $month_start = date( 'Y-m-01', strtotime( $today ) );
        $spend_resp = wp_remote_get(
            "https://api.openai.com/dashboard/billing/usage?start_date={$month_start}&end_date={$today}",
            [ 'timeout' => 15, 'headers' => $headers ]
        );

        $result = [];

        if ( ! is_wp_error( $credit_resp ) && wp_remote_retrieve_response_code( $credit_resp ) === 200 ) {
            $cd = json_decode( wp_remote_retrieve_body( $credit_resp ), true );
            if ( isset( $cd['total_available'] ) ) {
                $result['kalan_kredi']   = number_format( $cd['total_available'], 2 );
                $result['toplam_kredi']  = number_format( $cd['total_granted'], 2 );
                $result['harcanan']      = number_format( $cd['total_used'], 2 );
            }
        }

        if ( ! is_wp_error( $spend_resp ) && wp_remote_retrieve_response_code( $spend_resp ) === 200 ) {
            $sd = json_decode( wp_remote_retrieve_body( $spend_resp ), true );
            if ( isset( $sd['total_usage'] ) ) {
                // total_usage cent cinsinden gelir
                $result['bu_ay_harcama'] = number_format( $sd['total_usage'] / 100, 4 );
            }
        }

        // Hiçbir şey gelmediyse sadece key doğrulama yap
        if ( empty( $result ) ) {
            $model_resp = wp_remote_get( 'https://api.openai.com/v1/models', [
                'timeout' => 10,
                'headers' => $headers,
            ] );
            $code = wp_remote_retrieve_response_code( $model_resp );
            if ( $code === 200 ) {
                $result['durum'] = 'API key geçerli. Detaylı bakiye için platform.openai.com/usage adresini ziyaret edin.';
            } else {
                $err = json_decode( wp_remote_retrieve_body( $model_resp ), true );
                return new WP_Error( 'invalid_key', $err['error']['message'] ?? 'Geçersiz API key.' );
            }
        }

        return $result;
    }

    /* ---- Prompt ---- */
    public function build_prompt( $url, $page_content ) {
        return <<<PROMPT
Sen Hesaplamaa.com için SEO uyumlu, tamamen özgün ve insansı Türkçe makaleler yazan bir uzmansın.

Aşağıdaki URL'deki hesaplama aracını inceledim, sayfa içeriği de ekte. Bu araca göre makale yaz.

URL: {$url}

SAYFA İÇERİĞİ (referans):
{$page_content}

---

KURALLAR:
- Metinler özgün olacak, yapay zeka izi bırakılmayacak, Google insan yazısı gibi algılamalı
- Samimi ama akademik tutarlılık korunacak
- Formüller metin olarak yazılacak (resim veya LaTeX yok)
- Teknik konularda örnek hesaplamalar ve tablolar yer alacak
- Paragraflar 100-150 kelimeyi, cümleler 20 kelimeyi aşmayacak
- Etken çatı, %30+ geçiş kelimesi, ardışık cümlelerde aynı kelime başlamayacak
- Odak anahtar kelime ilk paragrafta, alt başlıklarda ve metin boyunca eşit dağılacak
- Yoast SEO yeşil puanı hedefleniyor
- Yaklaşık 2000 kelime
- Kişisel deneyim benzeri insansı ifadeler kullan

YAPI (bu sırayla):
H1 başlık → Giriş (önem + anahtar kelime) → Tanım/Temel Bilgi → Formül/Yöntem →
Örnek Hesaplama → Kullanım Alanları → İpuçları → SSS (min 4 soru) →
Sonuç + CTA ("📌 Hemen [X] aracını kullanın.")

İÇERİK HTML olarak yaz (h2, h3, p, ul, ol, table etiketleri kullan, h1 dahil etme).

---

YANIT FORMATÜ — sadece geçerli JSON döndür, başka hiçbir şey ekleme:

{
  "odak_anahtar_kelime": "...",
  "meta_baslik": "... (55-60 karakter)",
  "meta_aciklama": "... (120-155 karakter, odak anahtar kelime içerecek)",
  "etiketler": ["etiket1", "etiket2", "etiket3", "etiket4", "etiket5", "etiket6"],
  "baslik": "Sayfa H1 başlığı",
  "icerik": "<h2>...</h2><p>...</p>..."
}
PROMPT;
    }

    /* Başlık tabanlı prompt — URL olmadan */
    public function build_prompt_from_title( $title ) {
        return $this->build_prompt( '', "Konu: {$title} hesaplama aracı. Hesaplamaa.com'daki bu hesap makinesi için SEO makalesi yaz." );
    }
}
