<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_performans_primi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-perf-prim',
        HC_PLUGIN_URL . 'modules/performans-primi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-perf-prim-css',
        HC_PLUGIN_URL . 'modules/performans-primi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-performans-primi-hesaplama">
        <h3>Performans Primi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pp-salary">Brüt Maaş (TL)</label>
            <input type="number" id="hc-pp-salary" placeholder="Aylık Brüt Maaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-pp-target">Hedef Gerçekleştirme Oranı (%)</label>
            <input type="number" id="hc-pp-target" placeholder="Örn: 110">
        </div>

        <div class="hc-form-group">
            <label for="hc-pp-max">Maksimum Prim Oranı (% Maaş)</label>
            <input type="number" id="hc-pp-max" placeholder="Örn: 20">
            <small>Hedef %100 gerçekleştiğinde alınacak prim oranı.</small>
        </div>
        
        <button class="hc-btn" onclick="hcPerfPrimHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-perf-prim-result">
            <div class="hc-result-item">
                <span>Gerçekleşme Katsayısı:</span>
                <strong id="hc-pp-res-ratio">-</strong>
            </div>
            <div class="hc-result-value" id="hc-pp-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Hak Edilen Performans Primi</p>
        </div>
    </div>
    <?php
}
