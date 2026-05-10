<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_protein_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-protein',
        HC_PLUGIN_URL . 'modules/gunluk-protein-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-protein-css',
        HC_PLUGIN_URL . 'modules/gunluk-protein-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-protein">
        <h3>Günlük Protein İhtiyacı</h3>
        <div class="hc-form-group">
            <label for="hc-p-weight">Kilo (kg):</label>
            <input type="number" id="hc-p-weight" placeholder="75">
        </div>
        <div class="hc-form-group">
            <label for="hc-p-activity">Yaşam Tarzı:</label>
            <select id="hc-p-activity">
                <option value="0.8">Sedanter (Hareketsiz)</option>
                <option value="1.2">Hafif Aktif (Haftada 1-2 egzersiz)</option>
                <option value="1.6">Aktif (Kas gelişimi hedefleyen)</option>
                <option value="2.0">Profesyonel / Ağır Spor</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcProteinHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-protein-result">
            <strong>Gereken Günlük Protein:</strong>
            <div id="hc-p-res-val" class="hc-result-value">-</div>
            <span>gram</span>
        </div>
    </div>
    <?php
}
