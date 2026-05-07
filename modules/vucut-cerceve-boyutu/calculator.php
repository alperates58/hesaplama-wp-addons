<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_cerceve_boyutu( $atts ) {
    wp_enqueue_script(
        'hc-vucut-cerceve-boyutu',
        HC_PLUGIN_URL . 'modules/vucut-cerceve-boyutu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vucut-cerceve-boyutu-css',
        HC_PLUGIN_URL . 'modules/vucut-cerceve-boyutu/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vucut-cerceve-boyutu">
        <div class="hc-header">
            <h3>Vücut Çerçeve Boyutu</h3>
            <p>Bilek ölçünüze göre kemik yapınızın genişliğini öğrenin.</p>
        </div>
        
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <div class="hc-radio-group">
                <label><input type="radio" name="hc-frame-gender" value="male" checked> Erkek</label>
                <label><input type="radio" name="hc-frame-gender" value="female"> Kadın</label>
            </div>
        </div>

        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-frame-boy" placeholder="175">
            </div>
            <div class="hc-form-group">
                <label>Bilek Çevresi (cm)</label>
                <input type="number" id="hc-frame-wrist" placeholder="17" step="0.1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcFrameHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-frame-result">
            <div class="hc-res-box">
                <div class="hc-res-label">İSKELET YAPISI</div>
                <div class="hc-res-main" id="hc-res-frame-val">-</div>
                <div class="hc-res-info" id="hc-res-frame-info"></div>
            </div>
        </div>
    </div>
    <?php
}
