<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enflasyon_fark_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-inflation',
        HC_PLUGIN_URL . 'modules/enflasyon-fark-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-inflation-css',
        HC_PLUGIN_URL . 'modules/enflasyon-fark-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-inflation">
        <h3>Enflasyon Fark Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-inf-start">Başlangıç Endeksi (örn: Eski TÜFE):</label>
            <input type="number" id="hc-inf-start" step="0.01" placeholder="100.00">
        </div>
        <div class="hc-form-group">
            <label for="hc-inf-end">Bitiş Endeksi (örn: Yeni TÜFE):</label>
            <input type="number" id="hc-inf-end" step="0.01" placeholder="125.50">
        </div>
        <button class="hc-btn" onclick="hcInflationHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-inflation-result">
            <strong>Enflasyon Oranı:</strong>
            <div id="hc-inf-res-val" class="hc-result-value">-</div>
            <p id="hc-inf-res-desc" style="margin-top:10px; font-size:0.9rem;"></p>
        </div>
    </div>
    <?php
}
