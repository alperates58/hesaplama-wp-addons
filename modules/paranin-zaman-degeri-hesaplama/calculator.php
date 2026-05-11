<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_paranin_zaman_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-paranin-zaman-degeri-hesaplama',
        HC_PLUGIN_URL . 'modules/paranin-zaman-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-paranin-zaman-degeri-hesaplama-css',
        HC_PLUGIN_URL . 'modules/paranin-zaman-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-paranin-zaman-degeri">
        <h3>Paranın Zaman Değeri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pzd-type">Hesaplama Türü</label>
            <select id="hc-pzd-type" onchange="hcPzdToggleInputs()">
                <option value="fv">Gelecek Değer Bul (FV)</option>
                <option value="pv">Bugünkü Değer Bul (PV)</option>
            </select>
        </div>
        <div class="hc-form-group" id="hc-pzd-pv-group">
            <label for="hc-pzd-pv">Bugünkü Değer (PV - ₺)</label>
            <input type="number" id="hc-pzd-pv" placeholder="Örn: 10.000">
        </div>
        <div class="hc-form-group" id="hc-pzd-fv-group" style="display:none;">
            <label for="hc-pzd-fv">Gelecekteki Değer (FV - ₺)</label>
            <input type="number" id="hc-pzd-fv" placeholder="Örn: 15.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-pzd-rate">Yıllık Oran (Enflasyon veya Faiz %)</label>
            <input type="number" id="hc-pzd-rate" placeholder="Örn: 20" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pzd-time">Süre (Yıl)</label>
            <input type="number" id="hc-pzd-time" placeholder="Örn: 5" step="1">
        </div>
        <button class="hc-btn" onclick="hcParaninZamanDegeriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pzd-result">
            <p id="hc-pzd-result-label">Hesaplanan Değer:</p>
            <div class="hc-result-value" id="hc-pzd-value">-</div>
            <p class="hc-small-text">Paranın satın alma gücünün zaman içindeki değişimini gösterir.</p>
        </div>
    </div>
    <?php
}
