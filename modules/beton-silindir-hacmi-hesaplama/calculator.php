<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beton_silindir_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beton-silindir-hacmi-hesaplama',
        HC_PLUGIN_URL . 'modules/beton-silindir-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beton-silindir-hacmi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/beton-silindir-hacmi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beton-silindir-hacmi-hesaplama">
        <h3>Beton Silindir Hacim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bsh-diam">Çap (cm)</label>
            <input type="number" id="hc-bsh-diam" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bsh-height">Yükseklik / Derinlik (m)</label>
            <input type="number" id="hc-bsh-height" placeholder="Örn: 2" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bsh-count">Adet</label>
            <input type="number" id="hc-bsh-count" value="1">
        </div>
        <button class="hc-btn" onclick="hcBSHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bsh-result">
            <div class="hc-result-label">Toplam Beton Hacmi:</div>
            <div class="hc-result-value" id="hc-bsh-val">-</div>
            <div class="hc-result-note">V = π * r² * h</div>
        </div>
    </div>
    <?php
}
