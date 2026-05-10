<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_icme_hedefi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-su-icme-hedefi-hesaplama',
        HC_PLUGIN_URL . 'modules/su-icme-hedefi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-su-icme-hedefi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/su-icme-hedefi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-intake">
        <h3>Günlük Su İçme Hedefi</h3>
        <div class="hc-form-group">
            <label for="hc-wi-weight">Kilo (kg)</label>
            <input type="number" id="hc-wi-weight" placeholder="Örn: 70">
        </div>
        <div class="hc-form-group">
            <label for="hc-wi-activity">Aktivite Seviyesi</label>
            <select id="hc-wi-activity">
                <option value="low">Düşük (Hareketsiz)</option>
                <option value="medium">Orta (Hafif Egzersiz)</option>
                <option value="high">Yüksek (Düzenli Spor)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSuHedefiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wi-result">
            <div class="hc-result-label">İdeal Miktar:</div>
            <div class="hc-result-value" id="hc-wi-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Baz: Kilo başına yaklaşık 35 mL su.</p>
        </div>
    </div>
    <?php
}
