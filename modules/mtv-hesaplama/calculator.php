<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mtv_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mtv',
        HC_PLUGIN_URL . 'modules/mtv-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mtv-css',
        HC_PLUGIN_URL . 'modules/mtv-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mtv-hesaplama">
        <h3>MTV Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-mt-type">Araç Türü</label>
            <select id="hc-mt-type">
                <option value="car">Otomobil / Arazi Taşıtı</option>
                <option value="moto">Motosiklet</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-mt-age">Araç Yaşı</label>
            <select id="hc-mt-age">
                <option value="1">1-3 Yaş</option>
                <option value="4">4-6 Yaş</option>
                <option value="7">7-11 Yaş</option>
                <option value="12">12-15 Yaş</option>
                <option value="16">16+ Yaş</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-mt-engine">Motor Hacmi (cc)</label>
            <select id="hc-mt-engine">
                <option value="1300">1300 cc ve altı</option>
                <option value="1600">1301 - 1600 cc</option>
                <option value="1800">1601 - 1800 cc</option>
                <option value="2000">1801 - 2000 cc</option>
                <option value="2500">2001 - 2500 cc</option>
                <option value="9999">4000 cc üstü</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcMTV_Hesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-mtv-result">
            <div class="hc-result-item">
                <span>1. Taksit (Ocak):</span>
                <strong id="hc-mt-res-t1">-</strong>
            </div>
            <div class="hc-result-item">
                <span>2. Taksit (Temmuz):</span>
                <strong id="hc-mt-res-t2">-</strong>
            </div>
            <div class="hc-result-value" id="hc-mt-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yıllık Toplam MTV Tutarı</p>
        </div>
    </div>
    <?php
}
