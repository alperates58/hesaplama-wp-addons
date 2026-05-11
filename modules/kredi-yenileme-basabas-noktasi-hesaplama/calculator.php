<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kredi_yenileme_basabas_noktasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kredi-yenileme-basabas',
        HC_PLUGIN_URL . 'modules/kredi-yenileme-basabas-noktasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kredi-yenileme-basabas-css',
        HC_PLUGIN_URL . 'modules/kredi-yenileme-basabas-noktasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kredi-yenileme">
        <h3>Kredi Yenileme Başabaş Noktası</h3>
        <div class="hc-form-group">
            <label for="hc-kyb-current-payment">Mevcut Kredi Aylık Taksit (₺)</label>
            <input type="number" id="hc-kyb-current-payment" placeholder="Örn: 5.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kyb-new-payment">Yeni Kredi Aylık Taksit (₺)</label>
            <input type="number" id="hc-kyb-new-payment" placeholder="Örn: 4.200">
        </div>
        <div class="hc-form-group">
            <label for="hc-kyb-costs">Yenileme Masrafları (Dosya, Ekspertiz, Kapatma Cezası vb. ₺)</label>
            <input type="number" id="hc-kyb-costs" placeholder="Örn: 10.000">
        </div>
        <button class="hc-btn" onclick="hcKrediYenilemeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kyb-result">
            <div class="hc-result-item">
                <span>Aylık Tasarruf:</span>
                <strong id="hc-kyb-monthly-savings">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Başabaş Noktası (Ay):</span>
                <strong class="hc-result-value" id="hc-kyb-months">-</strong>
            </div>
            <p class="hc-small-text">Başabaş noktası, elde ettiğiniz tasarrufun yenileme masraflarını karşıladığı süredir.</p>
        </div>
    </div>
    <?php
}
