<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ramazanda_su_ihtiyaci( $atts ) {
    wp_enqueue_script(
        'hc-ramadan-water',
        HC_PLUGIN_URL . 'modules/ramazanda-su-ihtiyaci/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ramadan-w">
        <h3>Ramazanda Su Tüketim Planı</h3>
        
        <div class="hc-form-group">
            <label for="hc-rw-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-rw-weight" placeholder="kg">
        </div>

        <button class="hc-btn" onclick="hcRamadanSuHesapla()">Planı Oluştur</button>

        <div class="hc-result" id="hc-ramadan-water-result">
            <div class="hc-result-item">
                <span>Günlük Toplam Hedef:</span>
                <div class="hc-result-value" id="hc-rw-total">-</div>
            </div>
            
            <div id="hc-rw-plan" style="margin-top: 15px;">
                <!-- Plan -->
            </div>

            <p style="font-size: 0.85em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *Su tüketimini tek seferde değil, iftar ile sahur arasına yaymak böbrek sağlığı ve sindirim için daha yararlıdır.
            </p>
        </div>
    </div>
    <?php
}
