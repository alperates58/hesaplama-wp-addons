<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilo_vermek_icin_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wl-calories',
        HC_PLUGIN_URL . 'modules/kilo-vermek-icin-kalori-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wl-calories-css',
        HC_PLUGIN_URL . 'modules/kilo-vermek-icin-kalori-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wl-calories">
        <h3>Kilo Verme Kalori Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-wlc-bmr">Günlük Yakılan Kalori (BMR x Aktivite):</label>
            <input type="number" id="hc-wlc-bmr" placeholder="2500">
        </div>
        <div class="hc-form-group">
            <label for="hc-wlc-goal">Haftalık Hedef:</label>
            <select id="hc-wlc-goal">
                <option value="500">Haftada 0.5 kg (Sağlıklı)</option>
                <option value="1000">Haftada 1 kg (Agresif)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcWlcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wl-calories-result">
            <strong>Hedef Günlük Kalori:</strong>
            <div id="hc-wlc-res-val" class="hc-result-value">-</div>
            <span>kcal</span>
        </div>
    </div>
    <?php
}
