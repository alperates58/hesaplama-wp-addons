<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gezegen_konumlari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-planets-pos',
        HC_PLUGIN_URL . 'modules/gezegen-konumlari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-planets-pos-css',
        HC_PLUGIN_URL . 'modules/gezegen-konumlari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gezegen-konumlari-hesaplama">
        <h3>Gezegen Konumları Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-planets-date">Doğum Tarihi</label>
            <input type="date" id="hc-planets-date">
        </div>
        <button class="hc-btn" onclick="hcGezegenKonumlariHesapla()">Konumları Hesapla</button>
        <div class="hc-result" id="hc-planets-result">
            <div id="hc-planets-table" class="hc-table-container"></div>
            <div class="hc-result-desc">
                Bu tablo, doğum anınızdaki gezegenlerin gökyüzündeki kesin konumlarını göstermektedir. Güneş kimliğinizi, Ay duygularınızı, Merkür zihninizi, Venüs aşkınızı, Mars enerjinizi, Jüpiter şansınızı ve Satürn sorumluluklarınızı temsil eder.
            </div>
        </div>
    </div>
    <?php
}
