<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_paneli_kac_panel_gerekir_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-quantity',
        HC_PLUGIN_URL . 'modules/gunes-paneli-kac-panel-gerekir-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-quantity-css',
        HC_PLUGIN_URL . 'modules/gunes-paneli-kac-panel-gerekir-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-quantity">
        <h3>Kaç Güneş Paneli Gerekir?</h3>
        
        <div class="hc-form-group">
            <label for="hc-sq-monthly">Aylık Ortalama Tüketim (kWh)</label>
            <input type="number" id="hc-sq-monthly" placeholder="Örn: 400" step="1">
            <small>Faturanızdaki aylık kWh tüketimi.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-sq-sun">Günlük Güneşlenme Süresi (Saat)</label>
            <input type="number" id="hc-sq-sun" value="5" step="0.5">
            <small>Türkiye için ortalama 5 saattir.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-sq-panel">Panel Gücü (Watt)</label>
            <select id="hc-sq-panel">
                <option value="400">400 Watt</option>
                <option value="450" selected>450 Watt</option>
                <option value="550">550 Watt</option>
                <option value="600">600 Watt</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcPanelSayisiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sq-result">
            <div class="hc-result-item">
                <span>Gerekli Sistem Gücü:</span>
                <span class="hc-result-value" id="hc-res-sq-power">-</span>
            </div>
            <div class="hc-result-item">
                <span>Gerekli Panel Sayısı:</span>
                <span class="hc-result-value highlight" id="hc-res-sq-count">-</span>
            </div>
            <div class="hc-result-note">
                * Sistem kayıpları (%25) ve kış aylarındaki düşük verim hesaba katılmıştır.
            </div>
        </div>
    </div>
    <?php
}
