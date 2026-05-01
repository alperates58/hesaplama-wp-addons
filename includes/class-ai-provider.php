<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_AI_Provider {

    private $option_key = 'hc_ai_settings';

    public function get_settings() {
        return wp_parse_args( get_option( $this->option_key, [] ), [
            'provider'             => 'openai',
            'api_key'              => '',
            'model'                => 'gpt-5-mini',
            'enable_writer_tab'    => '1',
            'enable_post_metabox'  => '1',
            'enable_module_generator' => '1',
        ] );
    }

    public function save_settings( $data ) {
        update_option( $this->option_key, [
            'provider'            => sanitize_text_field( $data['provider'] ?? 'openai' ),
            'api_key'             => sanitize_text_field( $data['api_key']  ?? '' ),
            'model'               => sanitize_text_field( $data['model']    ?? 'gpt-5-mini' ),
            'enable_writer_tab'   => ! empty( $data['enable_writer_tab'] ) ? '1' : '0',
            'enable_post_metabox' => ! empty( $data['enable_post_metabox'] ) ? '1' : '0',
            'enable_module_generator' => ! empty( $data['enable_module_generator'] ) ? '1' : '0',
        ] );
    }

    public function is_feature_enabled( $feature ) {
        $s = $this->get_settings();

        if ( 'post_metabox' === $feature ) {
            return ! empty( $s['enable_post_metabox'] );
        }

        if ( 'writer_tab' === $feature ) {
            return ! empty( $s['enable_writer_tab'] );
        }

        if ( 'module_generator' === $feature ) {
            return ! empty( $s['enable_module_generator'] );
        }

        return true;
    }

    public function generate( $prompt, $override_model = '' ) {
        $s = $this->get_settings();
        if ( empty( $s['api_key'] ) ) return new WP_Error( 'no_key', 'API key girilmemis.' );

        if ( $override_model ) {
            $s['model'] = sanitize_text_field( $override_model );
            $s['strict_model'] = true;
        }

        return $s['provider'] === 'gemini'
            ? $this->generate_gemini( $prompt, $s )
            : $this->generate_openai( $prompt, $s );
    }

    public function generate_with_model( $prompt, $model ) {
        return $this->generate( $prompt, $model );
    }

    /* ---- OpenAI ---- */
    private function generate_openai( $prompt, $s ) {
        $messages = [
            [ 'role' => 'system', 'content' => $this->get_system_prompt() ],
            [ 'role' => 'user', 'content' => $prompt ],
        ];
        $body     = [
            'model'    => $s['model'],
            'messages' => $messages,
        ];

        if ( $this->is_reasoning_model( $s['model'] ) ) {
            $body['max_completion_tokens'] = 7000;
            $body['reasoning_effort']      = 'low';
        } else {
            $body['temperature'] = 0.85;
            $body['max_tokens']  = 7000;
        }

        $resp = wp_remote_post( 'https://api.openai.com/v1/chat/completions', [
            'timeout' => 120,
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $s['api_key'],
            ],
            'body' => wp_json_encode( $body ),
        ] );

        if ( is_wp_error( $resp ) ) return $resp;

        $code = wp_remote_retrieve_response_code( $resp );
        $data = json_decode( wp_remote_retrieve_body( $resp ), true );

        if ( $code !== 200 ) {
            $msg = $data['error']['message'] ?? 'OpenAI API hatasi.';

            if ( empty( $s['strict_model'] ) && $this->is_model_access_error( $msg ) && 'gpt-4o-mini' !== $s['model'] ) {
                $fallback = $s;
                $fallback['model'] = 'gpt-4o-mini';
                return $this->generate_openai( $prompt, $fallback );
            }

            return new WP_Error( 'api_error', $msg );
        }

        return $data['choices'][0]['message']['content'] ?? '';
    }

    private function is_reasoning_model( $model ) {
        return 0 === strpos( $model, 'gpt-5' ) || 0 === strpos( $model, 'o' );
    }

    private function is_model_access_error( $message ) {
        $message = strtolower( (string) $message );

        return false !== strpos( $message, 'does not have access to model' )
            || false !== strpos( $message, 'model_not_found' )
            || false !== strpos( $message, 'model not found' );
    }

    /* ---- Gemini ---- */
    private function generate_gemini( $prompt, $s ) {
        $url  = "https://generativelanguage.googleapis.com/v1beta/models/{$s['model']}:generateContent?key={$s['api_key']}";
        $resp = wp_remote_post( $url, [
            'timeout' => 90,
            'headers' => [ 'Content-Type' => 'application/json' ],
            'body'    => wp_json_encode( [
                'contents'         => [ [ 'role' => 'user', 'parts' => [ [ 'text' => $this->get_system_prompt() . "\n\n" . $prompt ] ] ] ],
                'generationConfig' => [ 'temperature' => 0.85, 'maxOutputTokens' => 8192 ],
            ] ),
        ] );

        if ( is_wp_error( $resp ) ) return $resp;

        $code = wp_remote_retrieve_response_code( $resp );
        $data = json_decode( wp_remote_retrieve_body( $resp ), true );

        if ( $code !== 200 ) {
            $msg = $data['error']['message'] ?? 'Gemini API hatasi.';
            return new WP_Error( 'api_error', $msg );
        }

        return $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
    }

    /* ---- OpenAI kullanim/kredi sorgula ---- */
    public function get_openai_usage() {
        $s = $this->get_settings();
        if ( empty( $s['api_key'] ) ) return new WP_Error( 'no_key', 'API key yok.' );

        $headers = [
            'Authorization' => 'Bearer ' . $s['api_key'],
            'Content-Type'  => 'application/json',
        ];

        $credit_resp = wp_remote_get( 'https://api.openai.com/dashboard/billing/credit_grants', [
            'timeout' => 15,
            'headers' => $headers,
        ] );

        $today       = current_time( 'Y-m-d' );
        $month_start = date( 'Y-m-01', strtotime( $today ) );
        $spend_resp  = wp_remote_get(
            "https://api.openai.com/dashboard/billing/usage?start_date={$month_start}&end_date={$today}",
            [ 'timeout' => 15, 'headers' => $headers ]
        );

        $result = [];

        if ( ! is_wp_error( $credit_resp ) && wp_remote_retrieve_response_code( $credit_resp ) === 200 ) {
            $cd = json_decode( wp_remote_retrieve_body( $credit_resp ), true );
            if ( isset( $cd['total_available'] ) ) {
                $result['kalan_kredi']  = number_format( $cd['total_available'], 2 );
                $result['toplam_kredi'] = number_format( $cd['total_granted'], 2 );
                $result['harcanan']     = number_format( $cd['total_used'], 2 );
            }
        }

        if ( ! is_wp_error( $spend_resp ) && wp_remote_retrieve_response_code( $spend_resp ) === 200 ) {
            $sd = json_decode( wp_remote_retrieve_body( $spend_resp ), true );
            if ( isset( $sd['total_usage'] ) ) {
                $result['bu_ay_harcama'] = number_format( $sd['total_usage'] / 100, 4 );
            }
        }

        if ( empty( $result ) ) {
            $model_resp = wp_remote_get( 'https://api.openai.com/v1/models', [
                'timeout' => 10,
                'headers' => $headers,
            ] );
            $code = wp_remote_retrieve_response_code( $model_resp );
            if ( $code === 200 ) {
                $result['durum'] = 'API key gecerli. Detayli bakiye icin platform.openai.com/usage adresini ziyaret edin.';
            } else {
                $err = json_decode( wp_remote_retrieve_body( $model_resp ), true );
                return new WP_Error( 'invalid_key', $err['error']['message'] ?? 'Gecersiz API key.' );
            }
        }

        return $result;
    }

    private function get_system_prompt() {
        return <<<PROMPT
Sen Hesaplamaa.com icin Turkce icerik ureten kidemli bir SEO editoru ve konu uzmansin.

Temel hedefin, yapay zeka tarafindan yazildigi belli olmayan; dogal, akici, guven veren ve gercekten editorden cikmis gibi okunan icerikler uretmektir.

Zorunlu kurallar:
- Her icerik ozgun olacak; kalip girisler, jenerik gecisler ve robotik tekrarlar kullanma
- Samimi ama uzman bir dil kullan; bos ovgu, suslu cumle ve gereksiz dolgu yazma
- Turkiye'deki kullaniciyi hedefle; ornekleri ve kelime secimlerini buna gore kur
- Kisa ve net cumleler yaz; pasif yapiyi olabildigince azalt; paragraflari 2-4 satir araliginda tut
- Gecis kelimelerini dogal bicimde kullan: ayrica, ancak, bununla birlikte, ornegin, bu nedenle, sonuc olarak, ilk olarak, son olarak
- Anahtar kelimeyi spam gibi tekrar etme; dogal yogunlukta dagit
- H2 basliklari gercekten aciklayici olsun; birbirini tekrar eden alt basliklar kurma
- SSS bolumunde klise ve bos sorular yazma; kullanicinin gercek arama niyetine uygun 5 soru ve cevap uret
- Icerigi Adsense uyumlu tut; yaniltici, asiri iddiali veya guven vermeyen ifadeler kullanma
- Yanit sadece gecerli JSON olsun; aciklama, not, markdown veya kod blogu ekleme
PROMPT;
    }

    /* ---- Prompt ---- */
    public function build_prompt( $url, $page_content ) {
        return <<<PROMPT
Kullaniciya sunulacak icerik icin asagidaki kaynak bilgileri kullan.

URL: {$url}

SAYFA ICERIGI / REFERANS NOTLARI:
{$page_content}

---

GENEL KURALLAR:
- Konuyu once analiz et ve odak anahtar kelimeyi arama niyetine gore belirle
- Odak anahtar kelime su alanlarda mutlaka dogal bicimde yer alsin:
  SEO basliginda, ilk paragrafta, meta description icinde, URL slug onerisi icinde ve en az 1 H2 baslikta
- Icerikte anahtar kelimeyi dogal yogunlukta kullan; gereksiz tekrar yapma
- Icerik icin onerilen alt hedef 300 kelimedir; konu genisse veya rekabet yuksek gorunuyorsa daha kapsamli yaz
- 300 kelimeye ulasamiyorsan iceriği gecersiz sayma; en iyi, tutarli ve eksiksiz halini dondur
- Giris bolumu 50-80 kelime araliginda olsun ve ilk paragrafta odak anahtar kelime gecsin
- Kisa ve net cumleler kur; uzun, mekanik ve birbirine benzeyen cumle dizileri kurma
- Paragraflar kisa olsun; ideal olarak 2-4 satir araligini koru
- "Bu yazimizda", "sizler icin", "merak edilen tum detaylar" gibi klise kaliplari mumkunse kullanma
- Formul, yontem veya tablo gerekiyorsa acik bicimde ver; LaTeX kullanma
- Teknik konularda anlasilir ornek hesaplama ve gerekirse tablo ekle
- Etiketler 4-5 adet olsun; arama niyeti tasiyan, konuya ozel, 2-4 kelimelik uzun kuyruk etiketler uret
- Tek kelimelik veya jenerik etiket kullanma: "risk", "saglik", "hesaplama", "tansiyon", "kan basinci" gibi genis etiketler yasak
- Etiketler odak anahtar kelimeyle yakin iliskili olsun; ornek: "tansiyon risk hesaplama", "yuksek tansiyon riski", "tansiyon degerleri yorumu"
- Meta title en fazla 60 karakter olsun
- Meta description 120-156 karakter araliginda olsun
- URL slug kisa, temiz ve odak anahtar kelimeyi icersin
- Ic link onerileri ilgili hesaplama araclarina veya tamamlayici yazilara uygun gercekci oneriler olsun
- Gorsel alt text kisa, aciklayici ve odak anahtar kelime ile uyumlu olsun

OKUNABILIRLIK:
- Kisa ve net cumleler kullan
- Gecis kelimelerini dogal sekilde dagit
- Pasif cumlelerden kacin
- Gereksiz tekrar yapma

ICERIK YAPISI:
- H1 Baslik
- 50-80 kelimelik giris
- H2: [Anahtar kelime] nedir?
- H2: [Anahtar kelime] nasil yapilir?
- H2: Formul / yontem / tablo
- H2: Sik Sorulan Sorular
- H2: Sonuc

ICERIGI HTML olarak yaz:
- Sadece makale govdesini uret
- h1 ekleme; sistem H1 basligi ayri alanda kullanacak
- h2, h3, p, ul, ol, table, thead, tbody, tr, th, td etiketlerini gerektiginde kullan
- SSS bolumunu HTML icinde de isle, ayrica JSON icinde ayri bir `sss` alani olarak da ver

CIKTI ALANLARI:
- Konu
- SEO Baslik
- Meta Title
- Meta Description
- URL Slug
- Odak Anahtar Kelime
- Ikincil Anahtar Kelimeler
- Icerik
- SSS
- Ic Link Onerileri
- Gorsel ALT Text
- Yoast Kontrol

---

YANIT FORMATI - sadece gecerli JSON dondur:

{
  "konu": "Konu basligi",
  "seo_baslik": "Kisa SEO baslik onerisi",
  "meta_baslik": "60 karakteri asmayan meta title",
  "meta_aciklama": "120-156 karakter arasi meta description",
  "url_slug": "kisa-temiz-slug",
  "odak_anahtar_kelime": "Ana odak kelime",
  "ikincil_anahtar_kelimeler": ["...", "...", "..."],
  "etiketler": ["...", "...", "...", "...", "..."],
  "baslik": "Sayfa H1 basligi",
  "icerik": "<p>...</p><h2>...</h2>...",
  "sss": [
    { "soru": "...", "cevap": "..." },
    { "soru": "...", "cevap": "..." },
    { "soru": "...", "cevap": "..." },
    { "soru": "...", "cevap": "..." },
    { "soru": "...", "cevap": "..." }
  ],
  "ic_link_onerileri": ["...", "...", "..."],
  "gorsel_alt_text": "...",
  "yoast_kontrol": {
    "anahtar_kelime_baslikta": "EVET",
    "ilk_paragrafta": "EVET",
    "meta_aciklamada": "EVET",
    "alt_baslikta": "EVET",
    "okunabilirlik": "Yuksek",
    "seo_skoru": "Yuksek"
  }
}
PROMPT;
    }

    /* Baslik tabanli prompt - URL olmadan */
    public function build_prompt_from_title( $title ) {
        return $this->build_prompt( '', "Konu: {$title} hesaplama araci. Hesaplamaa.com'daki bu hesap makinesi icin SEO makalesi yaz." );
    }
}
