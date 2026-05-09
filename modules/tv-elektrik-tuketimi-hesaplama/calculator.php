<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tv_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tv-power',
        HC_PLUGIN_URL . 'modules/tv-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tv-power-css',
        HC_PLUGIN_URL . 'modules/tv-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tv-power">
        <h3>Televizyon Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-tv-type">TV Tipi ve Boyutu</label>
            <select id="hc-tv-type">
                <option value="30">LED TV 32" (30W)</option>
                <option value="50">LED TV 43" (50W)</option>
                <option value="75" selected>LED TV 55" (75W)</option>
                <option value="110">LED TV 65" (110W)</option>
                <option value="150">Eski Plazma/LCD (150W)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-tv-hours">Günlük İzleme Süresi (Saat)</label>
            <input type="number" id="hc-tv-hours" value="6" step="1">
        </div>

        <button class="hc-btn" onclick="hcTvStandartHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-tv-result">
            <div class="hc-result-item">
                <span>Aylık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-tv-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Tahmini Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-tv-cost">-</span>
            </div>
        </div>
    </div>
    <?php
}
