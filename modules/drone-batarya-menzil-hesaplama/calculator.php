<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_drone_batarya_menzil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-drone-batarya-menzil-hesaplama',
        HC_PLUGIN_URL . 'modules/drone-batarya-menzil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-drone-batarya-menzil-hesaplama-css',
        HC_PLUGIN_URL . 'modules/drone-batarya-menzil-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-drone-batarya-menzil-hesaplama">
        <h3>Drone Batarya Menzil Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-range-battery-voltage">Batarya Gerilimi (Volt)</label>
            <select id="hc-range-battery-voltage" class="hc-select">
                <option value="7.7">1S LiPo (7.7V)</option>
                <option value="14.8">2S LiPo (14.8V)</option>
                <option value="22.2">3S LiPo (22.2V)</option>
                <option value="44.4" selected>4S LiPo (44.4V)</option>
                <option value="55.5">5S LiPo (55.5V)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-range-battery-capacity">Batarya Kapasitesi (mAh)</label>
            <input type="number" id="hc-range-battery-capacity" class="hc-input" placeholder="Örn: 5935" value="5935" min="500" step="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-range-avg-speed">Ortalama Hız (km/h)</label>
            <input type="number" id="hc-range-avg-speed" class="hc-input" placeholder="Örn: 40" value="40" min="5" step="5">
        </div>

        <div class="hc-form-group">
            <label for="hc-range-power-consumption">Güç Tüketimi (W)</label>
            <input type="number" id="hc-range-power-consumption" class="hc-input" placeholder="Örn: 150" value="150" min="10" step="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-range-safety-percent">Güvenli Batarya Deşarjı (%)</label>
            <select id="hc-range-safety-percent" class="hc-select">
                <option value="100">100% (Teorik Max)</option>
                <option value="80" selected>80% (Güvenli)</option>
                <option value="60">60% (Çok Güvenli)</option>
                <option value="50">50% (Dönüş için Reserve)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcDroneBataryaMenzilHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-drone-batarya-menzil-hesaplama-result">
            <div class="hc-result-item">
                <span>Batarya Enerjisi:</span>
                <strong id="hc-range-energy-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Teorik Uçuş Süresi:</span>
                <strong id="hc-range-flight-time-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Maksimum Menzil (Gidiş):</span>
                <strong id="hc-range-max-range-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Güvenli Dönüş Menzili:</span>
                <strong id="hc-range-safe-return-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tavsiye:</span>
                <strong id="hc-range-recommendation-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
