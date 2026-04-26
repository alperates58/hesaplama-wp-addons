<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_AI_Provider {

    private $option_key = 'hc_ai_settings';

    public function get_settings() {
        return wp_parse_args( get_option( $this->option_key, [] ), [
            'api_key' => '',
            'model'   => 'gemini-2.0-flash',
        ] );
    }

    public function save_settings( $data ) {
        update_option( $this->option_key, [
            'api_key' => sanitize_text_field( $data['api_key'] ?? '' ),
            'model'   => sanitize_text_field( $data['model']   ?? 'gemini-2.0-flash' ),
        ] );
    }

    public function generate( $prompt ) {
        $s = $this->get_settings();
        if ( empty( $s['api_key'] ) ) return new WP_Error( 'no_key', 'API key girilmemiş.' );

        $url  = "https://generativelanguage.googleapis.com/v1beta/models/{$s['model']}:generateContent?key={$s['api_key']}";
        $body = [
            'contents' => [
                [ 'role' => 'user', 'parts' => [ [ 'text' => $prompt ] ] ]
            ],
            'generationConfig' => [
                'temperature'     => 0.8,
                'maxOutputTokens' => 8192,
            ],
        ];

        $resp = wp_remote_post( $url, [
            'timeout' => 90,
            'headers' => [ 'Content-Type' => 'application/json' ],
            'body'    => wp_json_encode( $body ),
        ] );

        if ( is_wp_error( $resp ) ) return $resp;

        $code = wp_remote_retrieve_response_code( $resp );
        $data = json_decode( wp_remote_retrieve_body( $resp ), true );

        if ( $code !== 200 ) {
            $msg = $data['error']['message'] ?? 'Bilinmeyen hata.';
            return new WP_Error( 'api_error', $msg );
        }

        return $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
    }

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

YANIT FORMATИ — sadece geçerli JSON döndür, başka hiçbir şey ekleme:

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
}
