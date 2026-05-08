<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_arac_sarj_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-charge-time',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-sarj-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-est-box">
        <h3>Elektrikli Araç Şarj Süresi</h3>
        <div class="hc-form-group">
            <label>Batarya Kapasitesi (kWh)</label>
            <input type="number" id="hc-est-capacity" value="60">
        </div>
        <div class="hc-form-group">
            <label>Şarj Aralığı (%)</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-est-start" value="20" placeholder="Başla">
                <input type="number" id="hc-est-end" value="80" placeholder="Bitir">
            </div>
        </div>
        <div class="hc-form-group">
            <label>Şarj İstasyonu Gücü (kW)</label>
            <select id="hc-est-power">
                <option value="2.3">2.3 kW (Ev Prizi)</option>
                <option value="3.7">3.7 kW (Wallbox Tek Faz)</option>
                <option value="7.4">7.4 kW (Wallbox)</option>
                <option value="11">11 kW (Wallbox Üç Faz)</option>
                <option value="22">22 kW (Hızlı AC)</option>
                <option value="50">50 kW (Hızlı DC)</option>
                <option value="120">120 kW (Süper Hızlı DC)</option>
                <option value="250">250 kW (Ultra Hızlı DC)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcEstHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-est-result">
            <div class="hc-result-title">Tahmini Şarj Süresi:</div>
            <div class="hc-result-value" id="hc-est-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* %80'den sonra şarj hızı pil sağlığı için otomatik olarak yavaşlar.</p>
        </div>
    </div>
    <?php
}
