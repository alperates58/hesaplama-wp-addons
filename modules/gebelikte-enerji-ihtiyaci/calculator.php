<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelikte_enerji_ihtiyaci( $atts ) {
    wp_enqueue_script(
        'hc-preg-energy',
        HC_PLUGIN_URL . 'modules/gebelikte-enerji-ihtiyaci/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pe-box">
        <h3>Gebelikte Günlük Kalori İhtiyacı</h3>
        
        <div class="hc-form-group">
            <label for="hc-ge-w">Kilonuz (kg)</label>
            <input type="number" id="hc-ge-w" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-ge-h">Boyunuz (cm)</label>
            <input type="number" id="hc-ge-h" placeholder="cm">
        </div>

        <div class="hc-form-group">
            <label for="hc-ge-a">Yaşınız</label>
            <input type="number" id="hc-ge-a" placeholder="Yaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-ge-trim">Kaçıncı Üç Aylık Dönemdesiniz? (Trimester)</label>
            <select id="hc-ge-trim">
                <option value="0">1. Trimester (0-13 Hafta)</option>
                <option value="340">2. Trimester (14-26 Hafta)</option>
                <option value="450">3. Trimester (27-40+ Hafta)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcPregEnerjiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-preg-energy-result">
            <div class="hc-result-item">
                <span>Günlük Toplam Kalori Hedefi:</span>
                <div class="hc-result-value" id="hc-ge-val">-</div>
            </div>
            <p id="hc-ge-extra" style="margin-top: 15px; font-size: 0.9em; text-align: center; color: #666;">
                <!-- Ek kalori bilgisi -->
            </p>
        </div>
    </div>
    <?php
}
