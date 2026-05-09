<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lambader_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lamp-cons',
        HC_PLUGIN_URL . 'modules/lambader-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lamp-cons-css',
        HC_PLUGIN_URL . 'modules/lambader-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lamp-cons">
        <h3>Lambader Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-lc-bulb">Ampul Tipi / Gücü</label>
            <select id="hc-lc-bulb">
                <option value="9">LED (9W)</option>
                <option value="15">LED Güçlü (15W)</option>
                <option value="20">Tasarruflu - CFL (20W)</option>
                <option value="60">Eski Tip - Akkor (60W)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-lc-count">Ampul Sayısı</label>
            <input type="number" id="hc-lc-count" value="1" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-lc-hours">Günlük Kullanım (Saat)</label>
            <input type="number" id="hc-lc-hours" value="5" step="1">
        </div>

        <button class="hc-btn" onclick="hcLambaderHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-lc-result">
            <div class="hc-result-item">
                <span>Aylık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-lc-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Tahmini Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-lc-cost">-</span>
            </div>
        </div>
    </div>
    <?php
}
