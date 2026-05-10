<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alkol_kan_seviyesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alkol-kan-seviyesi-hesaplama',
        HC_PLUGIN_URL . 'modules/alkol-kan-seviyesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alkol-kan-seviyesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/alkol-kan-seviyesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bac">
        <h3>Kan Alkol Seviyesi (BAC)</h3>
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <select id="hc-ba-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ba-weight">Kilo (kg)</label>
            <input type="number" id="hc-ba-weight" placeholder="75">
        </div>
        <div class="hc-form-group">
            <label for="hc-ba-amount">Alkol Miktarı (mL)</label>
            <input type="number" id="hc-ba-amount" placeholder="Örn: 500 (1 şişe bira)">
        </div>
        <div class="hc-form-group">
            <label for="hc-ba-pct">Alkol Oranı (%)</label>
            <input type="number" id="hc-ba-pct" placeholder="Örn: 5" value="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-ba-time">Geçen Süre (Saat)</label>
            <input type="number" id="hc-ba-time" value="0" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcBACHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ba-result">
            <div class="hc-result-label">Tahmini Promil:</div>
            <div class="hc-result-value" id="hc-ba-val">-</div>
            <p id="hc-ba-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
