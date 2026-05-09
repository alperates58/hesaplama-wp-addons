<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kan_sekeri_degerlendirme( $atts ) {
    wp_enqueue_script(
        'hc-gl-eval',
        HC_PLUGIN_URL . 'modules/kan-sekeri-degerlendirme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gl-eval-box">
        <h3>Kan Şekeri Değerlendirme</h3>
        
        <div class="hc-form-group">
            <label for="hc-ge-fasting">Açlık Kan Şekeri (mg/dL)</label>
            <input type="number" id="hc-ge-fasting" placeholder="Örn: 90">
        </div>

        <div class="hc-form-group">
            <label for="hc-ge-post">Tokluk Kan Şekeri (Yemekten 2 saat sonra - mg/dL)</label>
            <input type="number" id="hc-ge-post" placeholder="Örn: 120">
        </div>

        <button class="hc-btn" onclick="hcSekerDegerlendir()">Değerlendir</button>

        <div class="hc-result" id="hc-gl-eval-result">
            <div id="hc-ge-status" style="padding: 15px; border-radius: 8px; text-align: center; font-weight: bold;">
                <!-- Durum -->
            </div>
            <div id="hc-ge-details" style="margin-top: 15px; font-size: 0.9em; line-height: 1.5;">
                <!-- Detaylar -->
            </div>
            <p style="font-size: 0.8em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *Bu araç bilgilendirme amaçlıdır. Kesin teşhis için mutlaka doktorunuza danışınız.
            </p>
        </div>
    </div>
    <?php
}
