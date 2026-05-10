<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_helyum_balon_kaldirma_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-helyum-balon-kaldirma-gucu-hesaplama',
        HC_PLUGIN_URL . 'modules/helyum-balon-kaldirma-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-helyum-balon-kaldirma-gucu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/helyum-balon-kaldirma-gucu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-helium">
        <h3>Helyum Balon Kaldırma Gücü</h3>
        <div class="hc-form-group">
            <label for="hc-he-radius">Balon Yarıçapı (cm)</label>
            <input type="number" id="hc-he-radius" placeholder="Örn: 15">
        </div>
        <p style="text-align:center; font-weight:bold;">VEYA</p>
        <div class="hc-form-group">
            <label for="hc-he-vol">Toplam Hacim (Litre)</label>
            <input type="number" id="hc-he-vol" placeholder="Örn: 14">
        </div>
        <button class="hc-btn" onclick="hcHelyumBalonKaldırmaGücüHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-he-result">
            <div class="hc-result-label">Tahmini Kaldırma Gücü:</div>
            <div class="hc-result-value" id="hc-he-val">-</div>
            <p style="font-size: 0.85em; margin-top: 10px; color: #666;">*Balonun kendi ağırlığı ve ip dahil edilmemiştir (Brüt değer).</p>
        </div>
    </div>
    <?php
}
