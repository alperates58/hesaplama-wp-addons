<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gpa_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gpa-cevirme',
        HC_PLUGIN_URL . 'modules/gpa-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gpa-cevir-calc">
        <h3>GPA Çevirme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Dönüşüm Tipi</label>
            <select id="hc-gc-type">
                <option value="4to100">4'lük Sistem -> 100'lük Sistem</option>
                <option value="100to4">100'lük Sistem -> 4'lük Sistem</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Notunuz</label>
            <input type="number" id="hc-gc-value" step="0.01" placeholder="Örn: 3.50 veya 88.33">
        </div>
        <button class="hc-btn" onclick="hcGPACevir()">Çevir</button>
        <div class="hc-result" id="hc-gc-result">
            <div class="hc-result-title">Dönüştürülen Not:</div>
            <div class="hc-result-value" id="hc-gc-val">-</div>
        </div>
    </div>
    <?php
}
