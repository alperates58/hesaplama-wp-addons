<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_absi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-absi-hesaplama',
        HC_PLUGIN_URL . 'modules/absi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-absi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/absi-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-absi-hesaplama">
        <div class="hc-header">
            <h3>ABSI (Vücut Şekil Endeksi)</h3>
            <p>Sadece kiloya değil, bel çevrenize göre metabolik riskinizi ölçün.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-absi-boy" placeholder="175">
            </div>
            <div class="hc-form-group">
                <label>Kilo (kg)</label>
                <input type="number" id="hc-absi-kilo" placeholder="75">
            </div>
            <div class="hc-form-group full-width">
                <label>Bel Çevresi (cm)</label>
                <input type="number" id="hc-absi-bel" placeholder="90">
            </div>
        </div>

        <button class="hc-btn" onclick="hcAbsiHesapla()">Riski Hesapla</button>

        <div class="hc-result" id="hc-absi-result">
            <div class="hc-res-box">
                <div class="hc-res-label">HESAPLANAN ABSI</div>
                <div class="hc-res-main" id="hc-res-absi-val">0</div>
            </div>
            <div class="hc-res-note">
                <strong>Not:</strong> ABSI değeri arttıkça (özellikle 0.08 ve üzeri) iç organ yağlanmasına bağlı sağlık riskleri artabilir.
            </div>
        </div>
    </div>
    <?php
}
