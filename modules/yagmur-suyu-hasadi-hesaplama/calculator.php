<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yagmur_suyu_hasadi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yagmur-suyu-hasadi-hesaplama',
        HC_PLUGIN_URL . 'modules/yagmur-suyu-hasadi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yagmur-suyu-hasadi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yagmur-suyu-hasadi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rain-harvest">
        <h3>Yağmur Suyu Hasadı</h3>
        <div class="hc-form-group">
            <label for="hc-rh-area">Çatı Alanı (m²)</label>
            <input type="number" id="hc-rh-area" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-rh-rain">Yıllık Yağış Miktarı (mm)</label>
            <input type="number" id="hc-rh-rain" placeholder="Türkiye ort: 574">
        </div>
        <div class="hc-form-group">
            <label for="hc-rh-eff">Çatı Tipi / Verim</label>
            <select id="hc-rh-eff">
                <option value="0.9">Kiremit / Beton Çatı (%90 verim)</option>
                <option value="0.8">Metal Çatı (%80 verim)</option>
                <option value="0.5">Bahçe / Toprak Zemin (%50 verim)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcYağmurSuyuHasadıHesapla()">Hasadı Hesapla</button>
        <div class="hc-result" id="hc-rh-result">
            <div class="hc-result-label">Yıllık Toplanabilir Su:</div>
            <div class="hc-result-value" id="hc-rh-val">-</div>
        </div>
    </div>
    <?php
}
