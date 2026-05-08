<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_universite_mezuniyet_notu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uni-grad-calc',
        HC_PLUGIN_URL . 'modules/universite-mezuniyet-notu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-uni-grad-calc-box">
        <h3>Üniversite Mezuniyet Notu Hesaplama</h3>
        <div id="hc-uni-grad-rows">
            <div class="hc-form-group hc-uni-grad-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="number" step="0.01" class="hc-uni-grad-gpa" placeholder="Dönem GPA" style="flex: 1;">
                <input type="number" step="1" class="hc-uni-grad-credit" placeholder="Dönem Kredisi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcUniGradAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Dönem Ekle</button>
        <button class="hc-btn" onclick="hcUniGradHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-uni-grad-result">
            <div class="hc-result-title">Kümülatif Mezuniyet Notu:</div>
            <div class="hc-result-value" id="hc-uni-grad-val">-</div>
        </div>
    </div>
    <?php
}
