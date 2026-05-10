<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_organik_yukleme_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-olr-calc',
        HC_PLUGIN_URL . 'modules/organik-yukleme-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-olr-calc-css',
        HC_PLUGIN_URL . 'modules/organik-yukleme-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-olr-calc">
        <h3>Organik Yükleme Hızı (OLR)</h3>
        <div class="hc-form-group">
            <label for="hc-ol-flow">Günlük Debi (Q) [m³ / gün]:</label>
            <input type="number" id="hc-ol-flow" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-ol-conc">Giriş KOİ Konsantrasyonu [mg/L]:</label>
            <input type="number" id="hc-ol-conc" placeholder="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-ol-vol">Reaktör Hacmi (V) [m³]:</label>
            <input type="number" id="hc-ol-vol" placeholder="200">
        </div>
        <button class="hc-btn" onclick="hcOlrHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-olr-calc-result">
            <strong>Organik Yükleme Hızı:</strong>
            <div id="hc-ol-res-val" class="hc-result-value">-</div>
            <span>kg KOİ / m³ · gün</span>
        </div>
    </div>
    <?php
}
