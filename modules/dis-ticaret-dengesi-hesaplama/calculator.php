<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dis_ticaret_dengesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dis-ticaret-dengesi-hesaplama',
        HC_PLUGIN_URL . 'modules/dis-ticaret-dengesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dis-ticaret-dengesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dis-ticaret-dengesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dis-ticaret-dengesi">
        <h3>Dış Ticaret Dengesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dtd-export">Toplam İhracat ($)</label>
            <input type="number" id="hc-dtd-export" placeholder="Örn: 250.000.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-dtd-import">Toplam İthalat ($)</label>
            <input type="number" id="hc-dtd-import" placeholder="Örn: 360.000.000.000">
        </div>
        <button class="hc-btn" onclick="hcDisTicaretDengesiHesapla()">Dengeyi Hesapla</button>
        <div class="hc-result" id="hc-dtd-result">
            <div class="hc-result-item">
                <span>Dış Ticaret Dengesi ($):</span>
                <strong class="hc-result-value" id="hc-dtd-balance">-</strong>
            </div>
            <div class="hc-result-item">
                <span>İhracatın İthalatı Karşılama Oranı:</span>
                <strong id="hc-dtd-ratio">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Dış Ticaret Hacmi ($):</span>
                <strong id="hc-dtd-volume">-</strong>
            </div>
        </div>
    </div>
    <?php
}
