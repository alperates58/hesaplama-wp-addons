<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-area-calc',
        HC_PLUGIN_URL . 'modules/alan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-area-calc-css',
        HC_PLUGIN_URL . 'modules/alan-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-area">
        <h3>Geometrik Alan Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-area-shape">Şekil Seçin</label>
            <select id="hc-area-shape" onchange="hcAlanSecimDegisti()">
                <option value="kare">Kare</option>
                <option value="dikdortgen">Dikdörtgen</option>
                <option value="daire">Daire</option>
                <option value="ucgen">Üçgen</option>
                <option value="yamuk">Yamuk</option>
            </select>
        </div>

        <div id="hc-area-inputs">
            <!-- Kare için varsayılan -->
            <div class="hc-form-group" id="group-a">
                <label id="label-a">Kenar (a)</label>
                <input type="number" id="hc-area-a" placeholder="m" step="any">
            </div>
            <div class="hc-form-group hc-hidden" id="group-b">
                <label id="label-b">Kenar (b)</label>
                <input type="number" id="hc-area-b" placeholder="m" step="any">
            </div>
            <div class="hc-form-group hc-hidden" id="group-h">
                <label id="label-h">Yükseklik (h)</label>
                <input type="number" id="hc-area-h" placeholder="m" step="any">
            </div>
        </div>

        <button class="hc-btn" onclick="hcAlanHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-area-result">
            <div class="hc-result-item">
                <span>Toplam Alan:</span>
                <span class="hc-result-value highlight" id="hc-res-area-val">-</span>
            </div>
            <div class="hc-result-note" id="hc-area-formula">
                * Formül: a²
            </div>
        </div>
    </div>
    <?php
}
