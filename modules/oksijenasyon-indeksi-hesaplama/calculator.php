<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oksijenasyon_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-oksijenasyon-indeksi',
        HC_PLUGIN_URL . 'modules/oksijenasyon-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-oksijenasyon-indeksi-css',
        HC_PLUGIN_URL . 'modules/oksijenasyon-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-oksijenasyon-indeksi">
        <h3>Oksijenasyon İndeksi (OI) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-oi-fio2">FiO2 (%):</label>
            <input type="number" id="hc-oi-fio2" placeholder="Örn: 40" min="21" max="100">
            <small>Solunan havadaki oksijen yüzdesi.</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-oi-map">Ortalama Hava Yolu Basıncı (MAP - cmH2O):</label>
            <input type="number" id="hc-oi-map" placeholder="Örn: 12" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-oi-pao2">PaO2 (mmHg):</label>
            <input type="number" id="hc-oi-pao2" placeholder="Örn: 80" step="0.1">
            <small>Arteriyel oksijen parsiyel basıncı.</small>
        </div>
        <button class="hc-btn" onclick="hcOksijenasyonIndeksiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-oksijenasyon-indeksi-result">
            <strong>Oksijenasyon İndeksi (OI):</strong>
            <div id="hc-oi-res-val" class="hc-result-value">-</div>
            <div id="hc-oi-res-desc" style="margin-top:10px;"></div>
        </div>
    </div>
    <?php
}
