<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lisans_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lisans-calc',
        HC_PLUGIN_URL . 'modules/lisans-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lis-calc">
        <h3>Lisans Ortalama Hesaplama</h3>
        <div id="hc-lis-rows">
            <div class="hc-form-group hc-lis-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="text" class="hc-lis-name" placeholder="Ders Adı" style="flex: 2;">
                <select class="hc-lis-grade" style="flex: 1;">
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
                <input type="number" step="0.5" class="hc-lis-credit" placeholder="Kredi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcLisAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcLisHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lis-result">
            <div class="hc-result-title">Lisans Not Ortalaması:</div>
            <div class="hc-result-value" id="hc-lis-val">-</div>
        </div>
    </div>
    <?php
}
