<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_patili_dostlar_icin_yas_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pet-age',
        HC_PLUGIN_URL . 'modules/patili-dostlar-icin-yas-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pet-age-css',
        HC_PLUGIN_URL . 'modules/patili-dostlar-icin-yas-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pet-age">
        <h3>Evcil Hayvan İnsan Yaşı Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-pa-type">Hayvan Türü:</label>
            <select id="hc-pa-type">
                <option value="cat">Kedi</option>
                <option value="dog-small">Küçük Köpek ( < 10kg )</option>
                <option value="dog-medium">Orta Köpek ( 10-25kg )</option>
                <option value="dog-large">Büyük Köpek ( > 25kg )</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-pa-age">Hayvanın Yaşı:</label>
            <input type="number" id="hc-pa-age" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcPetAgeHesapla()">İnsan Yaşına Dönüştür</button>
        <div class="hc-result" id="hc-pet-age-result">
            <strong>Tahmini İnsan Yaşı:</strong>
            <div id="hc-pa-res-val" class="hc-result-value">-</div>
            <span>Yaşında</span>
        </div>
    </div>
    <?php
}
