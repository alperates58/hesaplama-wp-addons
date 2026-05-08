<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kosu_kalori_yakimi( $atts ) {
    wp_enqueue_script(
        'hc-running-calories',
        HC_PLUGIN_URL . 'modules/kosu-kalori-yakimi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-running">
        <h3>Koşu Kalori Yakımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-rc-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-rc-weight" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-rc-speed">Koşu Hızı</label>
            <select id="hc-rc-speed">
                <option value="6.0">Yavaş Koşu / Jogging (7.5 km/sa)</option>
                <option value="8.3" selected>Orta Tempo Koşu (9.5 km/sa)</option>
                <option value="11.5">Hızlı Koşu (12.5 km/sa)</option>
                <option value="14.5">Çok Hızlı Koşu (16 km/sa)</option>
                <option value="9.0">Arazi Koşusu (Trail Running)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-rc-duration">Süre (Dakika)</label>
            <input type="number" id="hc-rc-duration" placeholder="Dakika">
        </div>

        <button class="hc-btn" onclick="hcKosuKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-running-calories-result">
            <div class="hc-result-item">
                <span>Yakılan Tahmini Kalori:</span>
                <div class="hc-result-value" id="hc-rc-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Koşu, en yüksek kalori yakımı sağlayan kardiyo egzersizlerinden biridir.
            </p>
        </div>
    </div>
    <?php
}
