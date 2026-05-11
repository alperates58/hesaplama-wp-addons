<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mekanik_avantaj_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mekanik-av',
        HC_PLUGIN_URL . 'modules/mekanik-avantaj-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mekanik-av">
        <h3>Mekanik Avantaj Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ma-in">Uygulanan Kuvvet (F<sub>in</sub> - Newton)</label>
            <input type="number" id="hc-ma-in" placeholder="Giriş kuvveti" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-ma-out">Elde Edilen Yük (F<sub>out</sub> - Newton)</label>
            <input type="number" id="hc-ma-out" placeholder="Çıkış kuvveti" step="any">
        </div>

        <button class="hc-btn" onclick="hcMaHesapla()">Avantajı Hesapla</button>

        <div class="hc-result" id="hc-ma-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Mekanik Avantaj (MA):</span>
                <span class="hc-result-value" id="hc-ma-res-total">--</span>
            </div>
            <p id="hc-ma-summary" style="text-align:center; font-size:0.9rem; margin-top:10px; color:#555;"></p>
        </div>
    </div>
    <?php
}
