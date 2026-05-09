<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lbm_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-lbm-hesaplayici',
        HC_PLUGIN_URL . 'modules/lbm-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lbm-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/lbm-hesaplayici/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lbm-hesaplayici">
        <div class="hc-header">
            <h3>Yağsız Vücut Kütlesi (LBM)</h3>
            <p>Vücudunuzdaki yağ dışı dokuların (kas, kemik, su) toplam ağırlığını öğrenin.</p>
        </div>
        
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <div class="hc-radio-group">
                <label><input type="radio" name="hc-lbm-gender" value="male" checked> Erkek</label>
                <label><input type="radio" name="hc-lbm-gender" value="female"> Kadın</label>
            </div>
        </div>

        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-lbm-boy" placeholder="175">
            </div>
            <div class="hc-form-group">
                <label>Kilo (kg)</label>
                <input type="number" id="hc-lbm-kilo" placeholder="75">
            </div>
        </div>

        <button class="hc-btn" onclick="hcLbmHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-lbm-result">
            <div class="hc-res-box">
                <div class="hc-res-label">HESAPLANAN LBM</div>
                <div class="hc-res-main">
                    <span id="hc-res-lbm-val">0</span>
                    <small>kg</small>
                </div>
                <div class="hc-res-info" id="hc-res-lbm-info"></div>
            </div>
        </div>
    </div>
    <?php
}
