<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hematokrit_hemoglobin_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hematokrit-hemoglobin-donusturme-hesaplama',
        HC_PLUGIN_URL . 'modules/hematokrit-hemoglobin-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hematokrit-hemoglobin-donusturme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hematokrit-hemoglobin-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hb-hct-conv">
        <h3>Hb ➔ Hct Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-hh-val">Değer</label>
            <input type="number" id="hc-hh-val" placeholder="Örn: 14" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-hh-type">Giriş Tipi</label>
            <select id="hc-hh-type">
                <option value="hb_to_hct">Hemoglobin (g/dL) ➔ Hematokrit</option>
                <option value="hct_to_hb">Hematokrit (%) ➔ Hemoglobin</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcHctHbDönüştürmeHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-hh-result">
            <div class="hc-result-label">Karşılığı:</div>
            <div class="hc-result-value" id="hc-hh-res">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Yaklaşık formül: Hematokrit = 3 * Hemoglobin</p>
        </div>
    </div>
    <?php
}
