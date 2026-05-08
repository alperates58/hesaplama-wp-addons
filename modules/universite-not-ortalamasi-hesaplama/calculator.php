<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_universite_not_ortalamasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uni-calc',
        HC_PLUGIN_URL . 'modules/universite-not-ortalamasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-uni-calc-box">
        <h3>Üniversite Not Ortalaması Hesaplama</h3>
        <div id="hc-uni-rows">
            <div class="hc-form-group hc-uni-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="text" class="hc-uni-name" placeholder="Ders Adı" style="flex: 2;">
                <select class="hc-uni-grade" style="flex: 1;">
                    <option value="4.0">AA (4.0)</option>
                    <option value="3.5">BA (3.5)</option>
                    <option value="3.0">BB (3.0)</option>
                    <option value="2.5">CB (2.5)</option>
                    <option value="2.0">CC (2.0)</option>
                    <option value="1.5">DC (1.5)</option>
                    <option value="1.0">DD (1.0)</option>
                    <option value="0.5">FD (0.5)</option>
                    <option value="0.0">FF (0.0)</option>
                </select>
                <input type="number" step="0.5" class="hc-uni-credit" placeholder="Kredi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcUniAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcUniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-uni-result">
            <div class="hc-result-title">Not Ortalaması (GPA):</div>
            <div class="hc-result-value" id="hc-uni-val">-</div>
        </div>
    </div>
    <?php
}
