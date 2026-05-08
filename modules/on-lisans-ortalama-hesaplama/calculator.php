<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_on_lisans_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-on-lisans-calc',
        HC_PLUGIN_URL . 'modules/on-lisans-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ol-calc">
        <h3>Ön Lisans Ortalama Hesaplama</h3>
        <div id="hc-ol-rows">
            <div class="hc-form-group hc-ol-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="text" class="hc-ol-name" placeholder="Ders Adı" style="flex: 2;">
                <select class="hc-ol-grade" style="flex: 1;">
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
                <input type="number" step="0.5" class="hc-ol-credit" placeholder="Kredi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcOlAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcOlHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ol-result">
            <div class="hc-result-title">Ön Lisans Not Ortalaması:</div>
            <div class="hc-result-value" id="hc-ol-val">-</div>
        </div>
    </div>
    <?php
}
