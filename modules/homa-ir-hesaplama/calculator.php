<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_homa_ir_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-homa-ir',
        HC_PLUGIN_URL . 'modules/homa-ir-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-homa">
        <h3>HOMA-IR İnsülin Direnci</h3>
        
        <div class="hc-form-group">
            <label for="hc-homa-glucose">Açlık Kan Şekeri (mg/dL)</label>
            <input type="number" id="hc-homa-glucose" placeholder="Örn: 90">
        </div>

        <div class="hc-form-group">
            <label for="hc-homa-insulin">Açlık İnsülini (µU/mL)</label>
            <input type="number" id="hc-homa-insulin" step="0.1" placeholder="Örn: 8.5">
        </div>

        <button class="hc-btn" onclick="hcHOMAHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-homa-result">
            <div class="hc-result-item">
                <span>HOMA-IR Skoru:</span>
                <div class="hc-result-value" id="hc-homa-value">-</div>
            </div>
            <div id="hc-homa-interp" style="margin-top: 15px; padding: 10px; border-radius: 5px; text-align: center; font-weight: bold;">
                <!-- JS -->
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *HOMA-IR = (Glikoz × İnsülin) / 405. Genellikle 2.5 üzerindeki değerler insülin direnci göstergesi olarak kabul edilir.
            </p>
        </div>
    </div>
    <?php
}
