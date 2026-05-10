<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vektorel_carpim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cross-product',
        HC_PLUGIN_URL . 'modules/vektorel-carpim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cross">
        <h3>Vektörel Çarpım (A × B)</h3>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
            <div>
                <h4>Vektör A</h4>
                <div class="hc-form-group"><label>Ax:</label><input type="number" id="hc-vc-ax" placeholder="1"></div>
                <div class="hc-form-group"><label>Ay:</label><input type="number" id="hc-vc-ay" placeholder="0"></div>
                <div class="hc-form-group"><label>Az:</label><input type="number" id="hc-vc-az" placeholder="0"></div>
            </div>
            <div>
                <h4>Vektör B</h4>
                <div class="hc-form-group"><label>Bx:</label><input type="number" id="hc-vc-bx" placeholder="0"></div>
                <div class="hc-form-group"><label>By:</label><input type="number" id="hc-vc-by" placeholder="1"></div>
                <div class="hc-form-group"><label>Bz:</label><input type="number" id="hc-vc-bz" placeholder="0"></div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcCrossProductHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vektorel-carpim-result">
            <strong>Sonuç Vektörü (C):</strong>
            <div id="hc-vc-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
