<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_yag_orani( $atts ) {
    wp_enqueue_script(
        'hc-vucut-yag-orani',
        HC_PLUGIN_URL . 'modules/vucut-yag-orani/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vucut-yag-orani-css',
        HC_PLUGIN_URL . 'modules/vucut-yag-orani/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vucut-yag-orani">
        <div class="hc-header">
            <h3>Vücut Yağ Oranı (Navy)</h3>
            <p>Vücut ölçümlerinizi girerek yağ yüzdenizi tahmin edin.</p>
        </div>
        
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <div class="hc-radio-group">
                <label><input type="radio" name="hc-bf-gender" value="male" checked onclick="hcToggleBfHip()"> Erkek</label>
                <label><input type="radio" name="hc-bf-gender" value="female" onclick="hcToggleBfHip()"> Kadın</label>
            </div>
        </div>

        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-bf-boy" placeholder="175">
            </div>
            <div class="hc-form-group">
                <label>Boyun Çevresi (cm)</label>
                <input type="number" id="hc-bf-neck" placeholder="40">
            </div>
            <div class="hc-form-group">
                <label>Bel Çevresi (cm)</label>
                <input type="number" id="hc-bf-waist" placeholder="85">
            </div>
            <div class="hc-form-group" id="hc-bf-hip-box" style="display:none;">
                <label>Kalça Çevresi (cm)</label>
                <input type="number" id="hc-bf-hip" placeholder="100">
            </div>
        </div>

        <button class="hc-btn" onclick="hcBfHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-bf-result">
            <div class="hc-res-box">
                <div class="hc-res-label">VÜCUT YAĞ ORANI</div>
                <div class="hc-res-main">
                    %<span id="hc-res-bf-val">0</span>
                </div>
                <div class="hc-res-info" id="hc-res-bf-info"></div>
            </div>
        </div>
    </div>
    <?php
}
