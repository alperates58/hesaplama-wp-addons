<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_jenerator_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-jenerator-gucu-hesaplama',
        HC_PLUGIN_URL . 'modules/jenerator-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-jenerator-gucu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/jenerator-gucu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gen">
        <h3>Jeneratör Gücü Hesaplama</h3>
        <div id="hc-gen-devices">
            <div class="hc-gen-row">
                <input type="text" class="hc-gen-name" placeholder="Cihaz Adı">
                <input type="number" class="hc-gen-watt" placeholder="Watt">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcAddGenRow()">+ Cihaz Ekle</button>
        <button class="hc-btn" onclick="hcJeneratörGücüHesapla()">Kapasiteyi Hesapla</button>
        
        <div class="hc-result" id="hc-gen-result">
            <div class="hc-result-label">Gereken Minimum Kapasite:</div>
            <div class="hc-result-value" id="hc-gen-val">-</div>
            <p style="font-size: 0.85em; margin-top: 10px;">*Hesaplamaya %20 emniyet payı ve 0.8 güç faktörü (cosφ) dahil edilmiştir.</p>
        </div>
    </div>
    <?php
}
