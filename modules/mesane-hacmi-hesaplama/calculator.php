<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mesane_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mesane-hacmi-hesaplama',
        HC_PLUGIN_URL . 'modules/mesane-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mesane-hacmi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mesane-hacmi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bladder-vol">
        <h3>Mesane Hacmi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bv-method">Hesaplama Yöntemi</label>
            <select id="hc-bv-method" onchange="hcBVToggle()">
                <option value="dims">Boyutlara Göre (Ultrason)</option>
                <option value="age">Yaşa Göre (Çocuklar)</option>
            </select>
        </div>
        <div id="hc-bv-dims">
            <div class="hc-form-group">
                <label for="hc-bv-l">Boy (cm)</label>
                <input type="number" id="hc-bv-l" placeholder="5">
            </div>
            <div class="hc-form-group">
                <label for="hc-bv-w">En (cm)</label>
                <input type="number" id="hc-bv-w" placeholder="4">
            </div>
            <div class="hc-form-group">
                <label for="hc-bv-d">Derinlik (cm)</label>
                <input type="number" id="hc-bv-d" placeholder="3">
            </div>
        </div>
        <div id="hc-bv-age-div" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-bv-age-val">Yaş</label>
                <input type="number" id="hc-bv-age-val" placeholder="5">
            </div>
        </div>
        <button class="hc-btn" onclick="hcMesaneHacmiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bv-result">
            <div class="hc-result-label">Tahmini Kapasite:</div>
            <div class="hc-result-value" id="hc-bv-res">-</div>
        </div>
    </div>
    <?php
}
