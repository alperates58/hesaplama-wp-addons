<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kiteboard_ruzgar_ve_ekipman_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kite-calc',
        HC_PLUGIN_URL . 'modules/kiteboard-ruzgar-ve-ekipman-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kite-calc-css',
        HC_PLUGIN_URL . 'modules/kiteboard-ruzgar-ve-ekipman-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kite-calc">
        <h3>Kite Boyutu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kc-weight">Vücut Ağırlığınız (kg):</label>
            <input type="number" id="hc-kc-weight" placeholder="75">
        </div>
        <div class="hc-form-group">
            <label for="hc-kc-wind">Rüzgar Hızı (Knot):</label>
            <input type="number" id="hc-kc-wind" placeholder="18">
            <small>Knot = deniz mili/saat</small>
        </div>
        <button class="hc-btn" onclick="hcKiteCalcHesapla()">Kite Boyutunu Bul</button>
        <div class="hc-result" id="hc-kite-calc-result">
            <strong>Önerilen Kite Boyutu:</strong>
            <div id="hc-kc-res-val" class="hc-result-value">-</div>
            <span>m² (Metrekare)</span>
            <p style="margin-top:10px; font-size:0.8rem;">Bu değer ortalama bir kullanıcı ve standart bir tahta için geçerlidir.</p>
        </div>
    </div>
    <?php
}
