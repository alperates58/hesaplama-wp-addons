<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_kadans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bisiklet-kadans-hesaplama',
        HC_PLUGIN_URL . 'modules/bisiklet-kadans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bisiklet-kadans-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bisiklet-kadans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bike-cad">
        <h3>Bisiklet Kadans Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bike-speed-input">Hız (km/h)</label>
            <input type="number" id="hc-bike-speed-input" placeholder="Örn: 30" value="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-bike-front-input">Aynakol (Ön)</label>
            <input type="number" id="hc-bike-front-input" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-bike-rear-input">Ruble (Arka)</label>
            <input type="number" id="hc-bike-rear-input" value="17">
        </div>
        <div class="hc-form-group">
            <label for="hc-bike-tire-input">Tekerlek</label>
            <select id="hc-bike-tire-input">
                <option value="2136">700x25c</option>
                <option value="2068">26x2.0</option>
                <option value="2298">29x2.2</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBisikletKadansHesapla()">Kadansı Hesapla</button>
        <div class="hc-result" id="hc-bike-cad-result">
            <div class="hc-result-label">Gereken Kadans:</div>
            <div class="hc-result-value" id="hc-bike-cad-val">-</div>
            <div id="hc-bike-cad-comment" style="margin-top: 10px; font-size: 0.9em;"></div>
        </div>
    </div>
    <?php
}
