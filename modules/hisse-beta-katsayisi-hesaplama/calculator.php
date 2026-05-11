<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hisse_beta_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hisse-beta',
        HC_PLUGIN_URL . 'modules/hisse-beta-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hisse-beta-css',
        HC_PLUGIN_URL . 'modules/hisse-beta-katsayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-h-beta">
        <h3>Hisse Beta Katsayısı (Tahmin)</h3>
        <p class="hc-small-text" style="margin-bottom: 15px;">Son 5 döneme (gün/hafta/ay) ait yüzdesel değişimleri girerek beta tahmini yapabilirsiniz.</p>
        <table class="hc-beta-table">
            <thead>
                <tr>
                    <th>Dönem</th>
                    <th>Hisse Değişimi (%)</th>
                    <th>Pazar Değişimi (%)</th>
                </tr>
            </thead>
            <tbody id="hc-beta-rows">
                <tr><td>1</td><td><input type="number" class="hc-hb-stock" placeholder="%"></td><td><input type="number" class="hc-hb-market" placeholder="%"></td></tr>
                <tr><td>2</td><td><input type="number" class="hc-hb-stock" placeholder="%"></td><td><input type="number" class="hc-hb-market" placeholder="%"></td></tr>
                <tr><td>3</td><td><input type="number" class="hc-hb-stock" placeholder="%"></td><td><input type="number" class="hc-hb-market" placeholder="%"></td></tr>
                <tr><td>4</td><td><input type="number" class="hc-hb-stock" placeholder="%"></td><td><input type="number" class="hc-hb-market" placeholder="%"></td></tr>
                <tr><td>5</td><td><input type="number" class="hc-hb-stock" placeholder="%"></td><td><input type="number" class="hc-hb-market" placeholder="%"></td></tr>
            </tbody>
        </table>
        <button class="hc-btn" onclick="hcHisseBetaHesapla()" style="margin-top: 15px;">Beta Katsayısını Hesapla</button>
        <div class="hc-result" id="hc-h-beta-result">
            <div class="hc-result-item">
                <span>Tahmini Beta (β):</span>
                <strong class="hc-result-value" id="hc-h-beta-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
