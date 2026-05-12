<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pirinc_su_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rice-water-prec-js',
        HC_PLUGIN_URL . 'modules/pirinc-su-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rice-water-prec-css',
        HC_PLUGIN_URL . 'modules/pirinc-su-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rice-water-prec">
        <h3>Hassas Pirinç/Su Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-rwp-rice">Pirinç Ağırlığı (Gram)</label>
            <input type="number" id="hc-rwp-rice" value="500" step="50">
        </div>

        <div class="hc-form-group">
            <label for="hc-rwp-type">Pirinç Türü</label>
            <select id="hc-rwp-type">
                <option value="1.5">Baldo / Osmancık (1 : 1.5)</option>
                <option value="2">Basmati (1 : 2)</option>
                <option value="1.2">Sushi Pirinci (1 : 1.2)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcPirincSuHassasHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-rice-water-prec-result">
            <div class="hc-result-item">
                <span>Gereken Su (ml/g):</span>
                <strong class="hc-result-value" id="hc-rwp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hassas mutfak terazisi kullanarak daha iyi sonuç elde edebilirsiniz.</div>
        </div>
    </div>
    <?php
}
