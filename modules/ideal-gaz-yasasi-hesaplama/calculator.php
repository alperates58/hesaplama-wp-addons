<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ideal_gaz_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ideal-gaz',
        HC_PLUGIN_URL . 'modules/ideal-gaz-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ideal-gaz-css',
        HC_PLUGIN_URL . 'modules/ideal-gaz-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ideal-gaz">
        <h3>İdeal Gaz Yasası (PV=nRT) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ig-calc">Hesaplanacak Değişken</label>
            <select id="hc-ig-calc" onchange="hcIGToggle()">
                <option value="P">Basınç (P)</option>
                <option value="V">Hacim (V)</option>
                <option value="n">Mol Sayısı (n)</option>
                <option value="T">Sıcaklık (T)</option>
            </select>
        </div>
        <div class="hc-form-group" id="hc-ig-p-group" style="display:none;">
            <label for="hc-ig-p">Basınç (atm)</label>
            <input type="number" id="hc-ig-p" placeholder="atm" step="any">
        </div>
        <div class="hc-form-group" id="hc-ig-v-group">
            <label for="hc-ig-v">Hacim (Litre)</label>
            <input type="number" id="hc-ig-v" placeholder="L" step="any">
        </div>
        <div class="hc-form-group" id="hc-ig-n-group">
            <label for="hc-ig-n">Mol Sayısı (mol)</label>
            <input type="number" id="hc-ig-n" placeholder="mol" step="any">
        </div>
        <div class="hc-form-group" id="hc-ig-t-group">
            <label for="hc-ig-t">Sıcaklık (°C)</label>
            <input type="number" id="hc-ig-t" placeholder="°C" step="any">
        </div>
        <button class="hc-btn" onclick="hcIGHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ig-result">
            <div class="hc-result-label">Sonuç:</div>
            <div class="hc-result-value" id="hc-ig-val">-</div>
            <div class="hc-result-note">R = 0.0821 L·atm/(mol·K)</div>
        </div>
    </div>
    <?php
}
