<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uyku_saati_planlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sleep-plan',
        HC_PLUGIN_URL . 'modules/uyku-saati-planlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sleep-plan-css',
        HC_PLUGIN_URL . 'modules/uyku-saati-planlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sleep-plan">
        <h3>İdeal Uyku Saati Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-sp-wake">Kaçta Uyanmalısınız?</label>
            <input type="time" id="hc-sp-wake" value="07:00">
        </div>
        <div class="hc-form-group">
            <label for="hc-sp-age">Yaş Grubunuz:</label>
            <select id="hc-sp-age">
                <option value="adult">Yetişkin (18-64)</option>
                <option value="teen">Ergen (14-17)</option>
                <option value="child">Çocuk (6-13)</option>
                <option value="senior">Yaşlı (65+)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSleepPlanHesapla()">Planı Oluştur</button>
        <div class="hc-result" id="hc-sleep-plan-result">
            <div id="hc-sp-res-list" class="hc-sp-list"></div>
        </div>
    </div>
    <?php
}
