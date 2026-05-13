<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_p_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-p-degeri-hesaplama',
        HC_PLUGIN_URL . 'modules/p-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-p-degeri-hesaplama-css',
        HC_PLUGIN_URL . 'modules/p-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-p-degeri-hesaplama">
        <h3>P Değeri Hesaplama (Z-Skoru)</h3>
        <div class="hc-form-group">
            <label for="hc-p-z">Z-Skoru</label>
            <input type="number" id="hc-p-z" step="any" placeholder="Örn: 1.96">
        </div>
        <div class="hc-form-group">
            <label for="hc-p-tail">Kuyruk Tipi</label>
            <select id="hc-p-tail">
                <option value="two">Çift Kuyruklu (Two-tailed)</option>
                <option value="left">Sol Kuyruklu (Left-tailed)</option>
                <option value="right">Sağ Kuyruklu (Right-tailed)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcPDeğeriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-p-degeri-hesaplama-result">
            <span class="hc-label">P-Değeri:</span>
            <div class="hc-result-value" id="hc-p-res-value">0</div>
            <div id="hc-p-significance" style="margin-top:15px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
