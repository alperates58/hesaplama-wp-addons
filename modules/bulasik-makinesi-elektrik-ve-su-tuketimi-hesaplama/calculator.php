<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bulasik_makinesi_elektrik_ve_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bulasik-makinesi-elektrik-ve-su-tuketimi-hesaplama',
        HC_PLUGIN_URL . 'modules/bulasik-makinesi-elektrik-ve-su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bulasik-makinesi-elektrik-ve-su-tuketimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bulasik-makinesi-elektrik-ve-su-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dishwasher">
        <h3>Bulaşık Makinesi Tüketim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dm-program">Program Tipi</label>
            <select id="hc-dm-program">
                <option value="0.8|10">Ekonomik / Eko (0.8 kWh, 10L)</option>
                <option value="1.2|15" selected>Standart / Otomatik (1.2 kWh, 15L)</option>
                <option value="1.6|20">Yoğun / 70°C (1.6 kWh, 20L)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-dm-count">Haftalık Çalıştırma Sayısı</label>
            <input type="number" id="hc-dm-count" value="7">
        </div>
        <button class="hc-btn" onclick="hcBulaşıkMakinesiElektrikVeSuTüketimiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dm-result">
            <div class="hc-result-label">Tahmini Aylık Maliyet:</div>
            <div class="hc-result-value" id="hc-dm-val">-</div>
            <p id="hc-dm-details" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
