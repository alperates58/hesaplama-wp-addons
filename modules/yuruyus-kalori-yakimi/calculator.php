<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuruyus_kalori_yakimi( $atts ) {
    wp_enqueue_script(
        'hc-walking-calories',
        HC_PLUGIN_URL . 'modules/yuruyus-kalori-yakimi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-walking">
        <h3>Yürüyüş Kalori Yakımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-wc-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-wc-weight" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-wc-speed">Yürüyüş Temposu</label>
            <select id="hc-wc-speed">
                <option value="2.8">Yavaş Tempo (3 km/sa)</option>
                <option value="3.5" selected>Orta Tempo (5 km/sa)</option>
                <option value="4.3">Hızlı Tempo (6 km/sa)</option>
                <option value="5.0">Çok Hızlı Tempo / Tempolu Yürüyüş (7 km/sa)</option>
                <option value="3.5">Engebeli Arazi / Doğa Yürüyüşü</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-wc-duration">Süre (Dakika)</label>
            <input type="number" id="hc-wc-duration" placeholder="Dakika">
        </div>

        <button class="hc-btn" onclick="hcYuruyusKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-walking-calories-result">
            <div class="hc-result-item">
                <span>Yakılan Tahmini Kalori:</span>
                <div class="hc-result-value" id="hc-wc-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Yürüyüşte kalori yakımı, hızın yanı sıra zemin eğimi ve kişinin kondisyonuna göre de değişebilir.
            </p>
        </div>
    </div>
    <?php
}
