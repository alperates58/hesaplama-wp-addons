<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gezegenlerin_ev_konumlari( $atts ) {
    wp_enqueue_script(
        'hc-pe-houses',
        HC_PLUGIN_URL . 'modules/gezegenlerin-ev-konumlari/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pe-houses-css',
        HC_PLUGIN_URL . 'modules/gezegenlerin-ev-konumlari/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gezegenlerin-ev-konumlari">
        <h3>Gezegenlerin Ev Konumları</h3>
        <div class="hc-form-group">
            <label for="hc-pe-date">Doğum Tarihi</label>
            <input type="date" id="hc-pe-date">
        </div>
        <div class="hc-form-group">
            <label for="hc-pe-time">Doğum Saati</label>
            <input type="time" id="hc-pe-time">
        </div>
        <div class="hc-form-group">
            <label for="hc-pe-city">Doğum Yeri</label>
            <select id="hc-pe-city">
                <option value="39.9,32.8">Ankara</option>
                <option value="41.0,29.0">İstanbul</option>
                <option value="38.4,27.1">İzmir</option>
                <option value="37.0,35.3">Adana</option>
                <option value="36.8,30.7">Antalya</option>
                <option value="40.2,29.0">Bursa</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcPlanetEvlerHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pe-result">
            <div id="hc-pe-list"></div>
        </div>
    </div>
    <?php
}
