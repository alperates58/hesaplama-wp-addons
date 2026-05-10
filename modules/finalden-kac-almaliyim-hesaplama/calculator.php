<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_finalden_kac_almaliyim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-exam-calc',
        HC_PLUGIN_URL . 'modules/finalden-kac-almaliyim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-exam-calc-css',
        HC_PLUGIN_URL . 'modules/finalden-kac-almaliyim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-exam">
        <h3>Finalden Kaç Almalıyım?</h3>
        <div class="hc-form-group">
            <label for="hc-ex-vize">Vize Notu:</label>
            <input type="number" id="hc-ex-vize" min="0" max="100" placeholder="örn: 60">
        </div>
        <div class="hc-form-group">
            <label for="hc-ex-vize-weight">Vize Ağırlığı (%):</label>
            <input type="number" id="hc-ex-vize-weight" value="40">
        </div>
        <div class="hc-form-group">
            <label for="hc-ex-pass">Geçme Notu:</label>
            <input type="number" id="hc-ex-pass" value="50">
        </div>
        <button class="hc-btn" onclick="hcExamCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-exam-result">
            <strong>Gereken Final Notu:</strong>
            <div id="hc-ex-res-val" class="hc-result-value">-</div>
            <p id="hc-ex-res-msg" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
