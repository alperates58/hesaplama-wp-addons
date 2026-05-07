<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bmi-hesaplama',
        HC_PLUGIN_URL . 'modules/bmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bmi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bmi-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bmi-hesaplama">
        <div class="hc-header">
            <h3>BMI (Vücut Kitle İndeksi)</h3>
            <p>Vücut kütle oranınızı ölçerek sağlıklı kilo aralığınızı bulun.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-bmi-boy" placeholder="175">
            </div>
            <div class="hc-form-group">
                <label>Kilo (kg)</label>
                <input type="number" id="hc-bmi-kilo" placeholder="70">
            </div>
        </div>

        <button class="hc-btn" onclick="hcBmiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-bmi-result">
            <div class="hc-res-main-box">
                <div class="hc-res-val" id="hc-res-bmi-val">0</div>
                <div class="hc-res-cat" id="hc-res-bmi-cat">Kategori</div>
            </div>
            
            <div class="hc-bmi-meter">
                <div class="hc-meter-bar">
                    <div class="hc-meter-pointer" id="hc-bmi-pointer"></div>
                </div>
                <div class="hc-meter-labels">
                    <span>18.5</span>
                    <span>25</span>
                    <span>30</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
