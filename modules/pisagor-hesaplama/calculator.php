<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pisagor_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pyth',
        HC_PLUGIN_URL . 'modules/pisagor-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pyth">
        <h3>Pisagor Hesaplama (a² + b² = c²)</h3>
        <p style="font-size: 0.8rem; margin-bottom: 15px;">Bilinmeyeni boş bırakın (sadece iki alan doldurun).</p>
        <div class="hc-form-group">
            <label for="hc-py-a">Kenar a:</label>
            <input type="number" id="hc-py-a" step="any" placeholder="3">
        </div>
        <div class="hc-form-group">
            <label for="hc-py-b">Kenar b:</label>
            <input type="number" id="hc-py-b" step="any" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-py-c">Hipotenüs c:</label>
            <input type="number" id="hc-py-c" step="any" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcPythHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pisagor-result">
            <strong>Sonuç:</strong>
            <div id="hc-py-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
