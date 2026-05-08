<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_icme_plani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-plan',
        HC_PLUGIN_URL . 'modules/su-icme-plani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-water-plan-box">
        <h3>Su İçme Planı Oluşturucu</h3>
        
        <div class="hc-form-group">
            <label for="hc-wp-goal">Günlük Su Hedefi (Litre)</label>
            <input type="number" id="hc-wp-goal" step="0.1" placeholder="Örn: 2.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-wp-wake">Uyanış Saati</label>
            <input type="time" id="hc-wp-wake" value="08:00">
        </div>

        <div class="hc-form-group">
            <label for="hc-wp-sleep">Yatış Saati</label>
            <input type="time" id="hc-wp-sleep" value="23:00">
        </div>

        <button class="hc-btn" onclick="hcSuPlaniHesapla()">Planı Oluştur</button>

        <div class="hc-result" id="hc-water-plan-result">
            <div id="hc-wp-table" style="margin-top: 15px;">
                <!-- Plan buraya gelecek -->
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *Su içmeyi unutmamak için telefonunuza hatırlatıcı kurmanız önerilir.
            </p>
        </div>
    </div>
    <?php
}
