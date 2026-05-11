<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_temettu_dagitim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-temettu-dagitim',
        HC_PLUGIN_URL . 'modules/temettu-dagitim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-temettu-dagitim-css',
        HC_PLUGIN_URL . 'modules/temettu-dagitim-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-temettu-d">
        <h3>Temettü Dağıtım Oranı (Payout Ratio)</h3>
        <div class="hc-form-group">
            <label for="hc-td-net-profit">Şirket Net Dönem Kârı (₺)</label>
            <input type="number" id="hc-td-net-profit" placeholder="Örn: 1.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-td-total-div">Dağıtılan Toplam Temettü (₺)</label>
            <input type="number" id="hc-td-total-div" placeholder="Örn: 400.000">
        </div>
        <button class="hc-btn" onclick="hcTemettuDagitimHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-td-result">
            <div class="hc-result-item">
                <span>Temettü Dağıtım Oranı:</span>
                <strong class="hc-result-value" id="hc-td-res-ratio">-</strong>
            </div>
            <p class="hc-small-text">Bu oran, şirketin kazancının ne kadarını yatırımcıyla paylaştığını gösterir.</p>
        </div>
    </div>
    <?php
}
