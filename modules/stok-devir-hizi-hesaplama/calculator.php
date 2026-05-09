<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stok_devir_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-inv-turnover',
        HC_PLUGIN_URL . 'modules/stok-devir-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-inv-turnover-css',
        HC_PLUGIN_URL . 'modules/stok-devir-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-inv-turnover">
        <h3>Stok Devir Hızı Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-it-cogs">Satılan Ticari Mallar Maliyeti [TL]</label>
            <input type="number" id="hc-it-cogs" value="500000">
        </div>
        <div class="hc-form-group">
            <label for="hc-it-avg">Ortalama Stok Değeri [TL]</label>
            <input type="number" id="hc-it-avg" value="100000">
        </div>
        <button class="hc-btn" onclick="hcInvTurnoverHesapla()">Hızı Hesapla</button>
        <div class="hc-result" id="hc-inv-turnover-result">
            <div class="hc-result-item">
                <span>Stok Devir Hızı:</span>
                <span class="hc-result-value" id="hc-res-it-val">0</span>
            </div>
            <div class="hc-result-item">
                <span>Stokta Kalma Süresi:</span>
                <span id="hc-res-it-days">0 gün</span>
            </div>
        </div>
    </div>
    <?php
}
