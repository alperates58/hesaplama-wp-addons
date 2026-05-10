<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ferritin_degeri_degerlendirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ferritin-degeri-degerlendirme-hesaplama',
        HC_PLUGIN_URL . 'modules/ferritin-degeri-degerlendirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ferritin-degeri-degerlendirme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ferritin-degeri-degerlendirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ferritin">
        <h3>Ferritin Değeri Değerlendirme</h3>
        <div class="hc-form-group">
            <label for="hc-fe-val">Ferritin Seviyesi (ng/mL)</label>
            <input type="number" id="hc-fe-val" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <select id="hc-fe-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcFerritinHesapla()">Değerlendir</button>
        <div class="hc-result" id="hc-fe-result">
            <div class="hc-result-label">Durum:</div>
            <div class="hc-result-value" id="hc-fe-res">-</div>
            <p id="hc-fe-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
