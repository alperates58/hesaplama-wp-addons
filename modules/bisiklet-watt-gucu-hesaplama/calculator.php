<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_watt_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bisiklet-watt-gucu-hesaplama',
        HC_PLUGIN_URL . 'modules/bisiklet-watt-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bisiklet-watt-gucu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bisiklet-watt-gucu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bike-watt">
        <h3>Bisiklet Watt Gücü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-watt-speed">Hız (km/h)</label>
            <input type="number" id="hc-watt-speed" value="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-watt-weight">Toplam Ağırlık (Bisiklet + Sürücü - kg)</label>
            <input type="number" id="hc-watt-weight" value="85">
        </div>
        <div class="hc-form-group">
            <label for="hc-watt-grade">Eğim (%)</label>
            <input type="number" id="hc-watt-grade" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-watt-pos">Sürüş Pozisyonu</label>
            <select id="hc-watt-pos">
                <option value="0.32">Üst Gidon (Hoods)</option>
                <option value="0.28">Alt Gidon (Drops)</option>
                <option value="0.40">Dik Oturuş (City Bike)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBisikletWattGücüHesapla()">Watt Hesapla</button>
        <div class="hc-result" id="hc-watt-result">
            <div class="hc-result-label">Tahmini Güç:</div>
            <div class="hc-result-value" id="hc-watt-val">-</div>
            <div id="hc-watt-wkg" style="margin-top: 10px; font-weight: 500;"></div>
        </div>
    </div>
    <?php
}
