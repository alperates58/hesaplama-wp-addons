<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ponderal_endeksi( $atts ) {
    wp_enqueue_script(
        'hc-ponderal-endeksi',
        HC_PLUGIN_URL . 'modules/ponderal-endeksi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ponderal-endeksi-css',
        HC_PLUGIN_URL . 'modules/ponderal-endeksi/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ponderal-endeksi">
        <div class="hc-header">
            <h3>Ponderal Endeksi</h3>
            <p>Vücut kütle oranınızı boyunuzun küpüne oranlayarak daha dengeli bir sonuç alın.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-pi-boy" placeholder="175">
            </div>
            <div class="hc-form-group">
                <label>Kilo (kg)</label>
                <input type="number" id="hc-pi-kilo" placeholder="70">
            </div>
        </div>

        <button class="hc-btn" onclick="hcPiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pi-result">
            <div class="hc-res-box">
                <div class="hc-res-label">PONDERAL ENDEKSİ</div>
                <div class="hc-res-main" id="hc-res-pi-val">0</div>
                <div class="hc-res-info" id="hc-res-pi-info"></div>
            </div>
        </div>
    </div>
    <?php
}
