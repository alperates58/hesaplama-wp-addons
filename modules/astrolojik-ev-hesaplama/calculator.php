<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_astrolojik_ev_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-houses-calc',
        HC_PLUGIN_URL . 'modules/astrolojik-ev-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-houses-calc-css',
        HC_PLUGIN_URL . 'modules/astrolojik-ev-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-astrolojik-ev-hesaplama">
        <h3>Astrolojik Ev Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ev-date">Doğum Tarihi</label>
            <input type="date" id="hc-ev-date">
        </div>
        <div class="hc-form-group">
            <label for="hc-ev-time">Doğum Saati</label>
            <input type="time" id="hc-ev-time">
        </div>
        <div class="hc-form-group">
            <label for="hc-ev-city">Doğum Yeri</label>
            <select id="hc-ev-city">
                <option value="39.9,32.8">Ankara</option>
                <option value="41.0,29.0">İstanbul</option>
                <option value="38.4,27.1">İzmir</option>
                <option value="37.0,35.3">Adana</option>
                <option value="36.8,30.7">Antalya</option>
                <option value="40.2,29.0">Bursa</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcEvlerHesapla()">Evleri Hesapla</button>
        <div class="hc-result" id="hc-ev-result">
            <div id="hc-ev-list" class="hc-ev-list"></div>
            <p class="hc-note">* Bu hesaplamada "Whole Sign" (Tüm Burç) ev sistemi kullanılmıştır.</p>
        </div>
    </div>
    <?php
}
