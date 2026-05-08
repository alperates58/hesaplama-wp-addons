<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_glisemik_yuk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gl-calc',
        HC_PLUGIN_URL . 'modules/glisemik-yuk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gl">
        <h3>Glisemik Yük Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gl-gi">Gıdanın Glisemik İndeksi (GI)</label>
            <input type="number" id="hc-gl-gi" placeholder="0 - 100">
        </div>

        <div class="hc-form-group">
            <label for="hc-gl-carbs">Porsiyondaki Net Karbonhidrat (g)</label>
            <input type="number" id="hc-gl-carbs" placeholder="Gram">
        </div>

        <button class="hc-btn" onclick="hcGLHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gl-result">
            <div class="hc-result-item">
                <span>Glisemik Yük (GY):</span>
                <div class="hc-result-value" id="hc-gl-value">-</div>
            </div>
            <div id="hc-gl-interp" style="margin-top: 15px; padding: 10px; border-radius: 5px; text-align: center; font-weight: bold;">
                <!-- JS ile -->
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Glisemik Yük, gıdanın kan şekerini ne kadar hızlı ve ne kadar süreyle yükselteceğini gösteren daha hassas bir ölçüdür.
            </p>
        </div>
    </div>
    <?php
}
