<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stor_perde_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-blind-size',
        HC_PLUGIN_URL . 'modules/stor-perde-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-blind-size-css',
        HC_PLUGIN_URL . 'modules/stor-perde-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-blind-size">
        <h3>Stor Perde Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-blind-w">Pencere Genişliği (cm)</label>
            <input type="number" id="hc-blind-w" placeholder="Örn: 150" min="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-blind-h">Pencere Yüksekliği (cm)</label>
            <input type="number" id="hc-blind-h" placeholder="Örn: 200" min="20">
        </div>
        <button class="hc-btn" onclick="hcBlindSizeHesapla()">Ölçüleri Al</button>
        <div class="hc-result" id="hc-blind-size-result">
            <div class="hc-result-item">
                <span>Perde Genişliği (Kasa):</span>
                <span id="hc-res-blind-w-kasa">0 cm</span>
            </div>
            <div class="hc-result-item">
                <span>Kumaş Genişliği:</span>
                <span id="hc-res-blind-w-kumas">0 cm</span>
            </div>
            <div class="hc-result-item">
                <span>Sipariş Yüksekliği:</span>
                <span id="hc-res-blind-h">0 cm</span>
            </div>
            <p class="hc-blind-warn">Uyarı: Stor perde kumaşı, mekanizma nedeniyle kasadan yaklaşık 4 cm daha dardır.</p>
        </div>
    </div>
    <?php
}
