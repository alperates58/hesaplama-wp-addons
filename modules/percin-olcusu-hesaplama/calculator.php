<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_percin_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rivet-calc',
        HC_PLUGIN_URL . 'modules/percin-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rivet-calc-css',
        HC_PLUGIN_URL . 'modules/percin-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rivet">
        <h3>Perçin Ölçüsü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rc-thick">Toplam Plaka Kalınlığı (mm):</label>
            <input type="number" id="hc-rc-thick" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-rc-diam">Perçin Çapı (mm):</label>
            <input type="number" id="hc-rc-diam" placeholder="4">
        </div>
        <button class="hc-btn" onclick="hcRivetCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rivet-result">
            <strong>Gereken Minimum Perçin Boyu:</strong>
            <div id="hc-rc-res-val" class="hc-result-value">-</div>
            <span>Milimetre (mm)</span>
            <p style="margin-top:10px; font-size:0.8rem;">Formül: Toplam Kalınlık + (1.5 x Perçin Çapı)</p>
        </div>
    </div>
    <?php
}
