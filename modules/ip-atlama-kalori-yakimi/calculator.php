<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ip_atlama_kalori_yakimi( $atts ) {
    wp_enqueue_script(
        'hc-jump-rope-calories',
        HC_PLUGIN_URL . 'modules/ip-atlama-kalori-yakimi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-jump-rope">
        <h3>İp Atlama Kalori Yakımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-jrc-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-jrc-weight" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-jrc-tempo">Atlama Temposu</label>
            <select id="hc-jrc-tempo">
                <option value="8.8">Yavaş (< 100 atlama/dk)</option>
                <option value="11.8" selected>Orta (100 - 120 atlama/dk)</option>
                <option value="12.3">Hızlı (120 - 160 atlama/dk)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-jrc-duration">Süre (Dakika)</label>
            <input type="number" id="hc-jrc-duration" placeholder="Dakika">
        </div>

        <button class="hc-btn" onclick="hcIpAtlamaKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-jump-rope-calories-result">
            <div class="hc-result-item">
                <span>Yakılan Tahmini Kalori:</span>
                <div class="hc-result-value" id="hc-jrc-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *İp atlama, kısa sürede yüksek kalori yaktıran etkili bir tüm vücut egzersizidir.
            </p>
        </div>
    </div>
    <?php
}
