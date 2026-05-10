<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uc_nokta_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-endpoint',
        HC_PLUGIN_URL . 'modules/uc-nokta-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-end">
        <h3>Uç Nokta Hesaplama</h3>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
            <div>
                <h4>Uç Nokta A</h4>
                <div class="hc-form-group"><label>x1:</label><input type="number" id="hc-e-x1" placeholder="2"></div>
                <div class="hc-form-group"><label>y1:</label><input type="number" id="hc-e-y1" placeholder="4"></div>
            </div>
            <div>
                <h4>Orta Nokta M</h4>
                <div class="hc-form-group"><label>xm:</label><input type="number" id="hc-e-xm" placeholder="5"></div>
                <div class="hc-form-group"><label>ym:</label><input type="number" id="hc-e-ym" placeholder="8"></div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcEndpointHesapla()">Uç Nokta B'yi Bul</button>
        <div class="hc-result" id="hc-uc-nokta-result">
            <strong>Uç Nokta B (x2, y2):</strong>
            <div id="hc-e-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
