<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_transkript_notu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trans-calc',
        HC_PLUGIN_URL . 'modules/transkript-notu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tr-calc">
        <h3>Transkript Notu Hesaplama</h3>
        <div id="hc-tr-rows">
            <div class="hc-form-group hc-tr-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="text" class="hc-tr-name" placeholder="Ders Adı" style="flex: 2;">
                <input type="number" step="0.01" class="hc-tr-grade" placeholder="Not (0-4)" style="flex: 1;">
                <input type="number" step="0.5" class="hc-tr-credit" placeholder="Kredi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcTrAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcTrHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tr-result">
            <div class="hc-result-title">Transkript Ortalaması (GANO):</div>
            <div class="hc-result-value" id="hc-tr-val">-</div>
        </div>
    </div>
    <?php
}
