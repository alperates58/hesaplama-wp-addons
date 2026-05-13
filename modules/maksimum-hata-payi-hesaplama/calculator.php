<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maksimum_hata_payi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-maksimum-hata-payi-hesaplama',
        HC_PLUGIN_URL . 'modules/maksimum-hata-payi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-maksimum-hata-payi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/maksimum-hata-payi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-maksimum-hata-payi-hesaplama">
        <h3>Maksimum Hata Payı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mhp-conf">Güven Düzeyi (%)</label>
            <select id="hc-mhp-conf">
                <option value="1.645">90%</option>
                <option value="1.96" selected>95%</option>
                <option value="2.576">99%</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-mhp-sigma">Standart Sapma (σ)</label>
            <input type="number" id="hc-mhp-sigma" step="any" placeholder="Örn: 15">
        </div>
        <div class="hc-form-group">
            <label for="hc-mhp-n">Örneklem Büyüklüğü (n)</label>
            <input type="number" id="hc-mhp-n" min="1" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcMaksHataHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-maksimum-hata-payi-hesaplama-result">
            <span class="hc-label">Hata Payı (E):</span>
            <div class="hc-result-value" id="hc-mhp-res-val">0</div>
            <div id="hc-mhp-res-desc" style="margin-top:10px; font-style:italic;"></div>
        </div>
    </div>
    <?php
}
