<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_spor_protein_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-spor-protein-ihtiyaci-hesaplama',
        HC_PLUGIN_URL . 'modules/spor-protein-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-spor-protein-ihtiyaci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/spor-protein-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-protein">
        <h3>Spor Protein İhtiyacı</h3>
        <div class="hc-form-group">
            <label for="hc-prot-weight">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-prot-weight" value="75">
        </div>
        <div class="hc-form-group">
            <label for="hc-prot-activity">Aktivite Seviyesi</label>
            <select id="hc-prot-activity">
                <option value="0.8">Sedanter (Hareketsiz)</option>
                <option value="1.2">Hafif Aktif / Dayanıklılık</option>
                <option value="1.6" selected>Orta (Fitness / Hipertrofi)</option>
                <option value="2.2">Ağır (Vücut Geliştirme / Powerlifting)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSporProteinİhtiyacıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-prot-result">
            <div class="hc-result-label">Günlük Protein İhtiyacı:</div>
            <div class="hc-result-value" id="hc-prot-val">-</div>
            <div id="hc-prot-desc" style="margin-top: 10px; font-size: 0.85em; line-height: 1.5;"></div>
        </div>
    </div>
    <?php
}
