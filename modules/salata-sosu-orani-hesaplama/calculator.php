<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_salata_sosu_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-salad-dressing-js',
        HC_PLUGIN_URL . 'modules/salata-sosu-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-salad-dressing-css',
        HC_PLUGIN_URL . 'modules/salata-sosu-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-salad-dressing">
        <h3>Salata Sosu Oranı</h3>
        
        <div class="hc-form-group">
            <label for="hc-sd-total">Hedef Toplam Sos (ml)</label>
            <input type="number" id="hc-sd-total" value="100" min="20" step="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-sd-ratio">Yağ : Asit Oranı</label>
            <select id="hc-sd-ratio">
                <option value="3">Klasik (3 : 1)</option>
                <option value="2">Daha Ekşi (2 : 1)</option>
                <option value="4">Hafif (4 : 1)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSosOraniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-salad-dressing-result">
            <div class="hc-result-item">
                <span>Zeytinyağı:</span>
                <strong id="hc-sd-res-oil">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Asit (Sirke/Limon):</span>
                <strong id="hc-sd-res-acid">-</strong>
            </div>
            <div class="hc-result-note">Klasik soslarda 3 ölçek yağa 1 ölçek asit eklenir.</div>
        </div>
    </div>
    <?php
}
