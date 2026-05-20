<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_drone_ucus_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-drone-ucus-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/drone-ucus-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-drone-ucus-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/drone-ucus-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-drone-ucus-suresi-hesaplama">
        <h3>Drone Uçuş Süresi Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-drone-battery-mah">Batarya Kapasitesi (mAh)</label>
            <select id="hc-drone-battery-mah" class="hc-select">
                <option value="1220">DJI Mini Series (1220 mAh)</option>
                <option value="2250" selected>DJI Air Series (2250 mAh)</option>
                <option value="5935">DJI Mavic Series (5935 mAh)</option>
                <option value="7590">DJI Inspire Series (7590 mAh)</option>
                <option value="5000">Generic (5000 mAh)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-drone-avg-current">Ortalama Akım Çekişi (A)</label>
            <input type="number" id="hc-drone-avg-current" class="hc-input" placeholder="Örn: 10" value="10" min="1" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-drone-discharge-percent">Deşarj Yüzdesi (%)</label>
            <select id="hc-drone-discharge-percent" class="hc-select">
                <option value="80" selected>80% (LiPo Güvenli)</option>
                <option value="90">90% (Standart)</option>
                <option value="100">100% (Maksimum)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcDroneUcusSuresiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-drone-ucus-suresi-hesaplama-result">
            <div class="hc-result-item">
                <span>Teorik Uçuş Süresi:</span>
                <strong id="hc-drone-theoretical-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Pratik Uçuş Süresi (~75%):</span>
                <strong id="hc-drone-practical-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Çok Güvenli Dönüş Süresi (~50%):</span>
                <strong id="hc-drone-safe-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Not:</span>
                <strong id="hc-drone-note-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
