<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_asiri_kilo_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-asiri-kilo-hesaplayici',
        HC_PLUGIN_URL . 'modules/asiri-kilo-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-asiri-kilo-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/asiri-kilo-hesaplayici/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-asiri-kilo-hesaplayici">
        <div class="hc-header">
            <h3>Aşırı Kilo Hesaplayıcı</h3>
            <p>Sağlıklı bir BMI değerine (24.9) ulaşmak için hedeflenmesi gereken kiloyu belirleyin.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-excess-boy" placeholder="175">
            </div>
            <div class="hc-form-group">
                <label>Mevcut Kilo (kg)</label>
                <input type="number" id="hc-excess-kilo" placeholder="85">
            </div>
        </div>

        <button class="hc-btn" onclick="hcExcessHesapla()">Analiz Et</button>

        <div class="hc-result" id="hc-excess-result">
            <div class="hc-res-box">
                <div class="hc-res-label">FAZLA KİLO MİKTARI</div>
                <div class="hc-res-main">
                    <span id="hc-res-excess-val">0</span>
                    <small>kg</small>
                </div>
                <div class="hc-res-info" id="hc-res-excess-info"></div>
            </div>
        </div>
    </div>
    <?php
}
