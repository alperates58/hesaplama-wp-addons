<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_asit_baz_titrasyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-titrasyon',
        HC_PLUGIN_URL . 'modules/asit-baz-titrasyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-titrasyon-css',
        HC_PLUGIN_URL . 'modules/asit-baz-titrasyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-titrasyon">
        <h3>Asit Baz Titrasyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tr-as-m">Asit Derişimi (Ma - mol/L)</label>
            <input type="number" id="hc-tr-as-m" placeholder="Bilinmiyorsa boş bırakın" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-tr-as-v">Asit Hacmi (Va - ml)</label>
            <input type="number" id="hc-tr-as-v" placeholder="ml" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-tr-as-n">Asit Tesir Değerliği (na)</label>
            <input type="number" id="hc-tr-as-n" placeholder="Örn: 1 (HCl), 2 (H2SO4)" value="1" step="any">
        </div>
        <hr style="border:0; border-top:1px solid rgba(255,255,255,0.1); margin:20px 0;">
        <div class="hc-form-group">
            <label for="hc-tr-bz-m">Baz Derişimi (Mb - mol/L)</label>
            <input type="number" id="hc-tr-bz-m" placeholder="Bilinmiyorsa boş bırakın" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-tr-bz-v">Baz Hacmi (Vb - ml)</label>
            <input type="number" id="hc-tr-bz-v" placeholder="ml" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-tr-bz-n">Baz Tesir Değerliği (nb)</label>
            <input type="number" id="hc-tr-bz-n" placeholder="Örn: 1 (NaOH), 2 (Ca(OH)2)" value="1" step="any">
        </div>
        <button class="hc-btn" onclick="hcTitrasyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tr-result">
            <div class="hc-result-label">Sonuç:</div>
            <div class="hc-result-value" id="hc-tr-val">-</div>
            <div class="hc-result-note">Ma * Va * na = Mb * Vb * nb</div>
        </div>
    </div>
    <?php
}
