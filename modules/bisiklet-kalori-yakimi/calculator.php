<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_kalori_yakimi( $atts ) {
    wp_enqueue_script(
        'hc-cycling-calories',
        HC_PLUGIN_URL . 'modules/bisiklet-kalori-yakimi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cycling">
        <h3>Bisiklet Kalori Yakımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-bc-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-bc-weight" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-bc-speed">Sürüş Hızı / Türü</label>
            <select id="hc-bc-speed">
                <option value="4.0">Yavaş Tempo (< 16 km/sa)</option>
                <option value="6.0" selected>Orta Tempo (16 - 19 km/sa)</option>
                <option value="8.0">Tempolu (19 - 22 km/sa)</option>
                <option value="10.0">Hızlı (22 - 25 km/sa)</option>
                <option value="12.0">Yarış Temposu (> 25 km/sa)</option>
                <option value="8.5">Dağ Bisikleti (Arazide)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-bc-duration">Süre (Dakika)</label>
            <input type="number" id="hc-bc-duration" placeholder="Dakika">
        </div>

        <button class="hc-btn" onclick="hcBisikletKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-cycling-calories-result">
            <div class="hc-result-item">
                <span>Yakılan Tahmini Kalori:</span>
                <div class="hc-result-value" id="hc-bc-value">-</div>
            </div>
        </div>
    </div>
    <?php
}
