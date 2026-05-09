<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hidroelektrik_enerji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hydro-energy',
        HC_PLUGIN_URL . 'modules/hidroelektrik-enerji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hydro-energy-css',
        HC_PLUGIN_URL . 'modules/hidroelektrik-enerji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hydro-energy">
        <h3>Hidroelektrik Enerji Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-he-power">Türbin Gücü (kW)</label>
            <input type="number" id="hc-he-power" placeholder="Örn: 500" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-he-hours">Çalışma Süresi (Saat/Gün)</label>
            <input type="number" id="hc-he-hours" value="24" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-he-days">Dönem Süresi (Gün)</label>
            <input type="number" id="hc-he-days" value="30" step="1">
        </div>

        <button class="hc-btn" onclick="hcHidroEnerjiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-he-result">
            <div class="hc-result-item">
                <span>Dönemlik Toplam Üretim:</span>
                <span class="hc-result-value highlight" id="hc-res-he-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>MWh Cinsinden:</span>
                <span class="hc-result-value" id="hc-res-he-mwh">-</span>
            </div>
        </div>
    </div>
    <?php
}
