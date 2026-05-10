<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uc_boyutta_iki_nokta_arasi_mesafe_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-3d-dist',
        HC_PLUGIN_URL . 'modules/uc-boyutta-iki-nokta-arasi-mesafe-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-3d-dist">
        <h3>3D İki Nokta Arası Mesafe</h3>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
            <div>
                <h4>Nokta 1</h4>
                <div class="hc-form-group"><label>x1:</label><input type="number" id="hc-3d-x1" placeholder="0"></div>
                <div class="hc-form-group"><label>y1:</label><input type="number" id="hc-3d-y1" placeholder="0"></div>
                <div class="hc-form-group"><label>z1:</label><input type="number" id="hc-3d-z1" placeholder="0"></div>
            </div>
            <div>
                <h4>Nokta 2</h4>
                <div class="hc-form-group"><label>x2:</label><input type="number" id="hc-3d-x2" placeholder="3"></div>
                <div class="hc-form-group"><label>y2:</label><input type="number" id="hc-3d-y2" placeholder="4"></div>
                <div class="hc-form-group"><label>z2:</label><input type="number" id="hc-3d-z2" placeholder="5"></div>
            </div>
        </div>
        <button class="hc-btn" onclick="hc3dDistHesapla()">Mesafe Hesapla</button>
        <div class="hc-result" id="hc-3d-dist-result">
            <strong>Mesafe:</strong>
            <div id="hc-3d-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
