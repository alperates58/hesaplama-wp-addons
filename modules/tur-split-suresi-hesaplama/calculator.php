<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tur_split_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-split-calc',
        HC_PLUGIN_URL . 'modules/tur-split-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-split-calc-css',
        HC_PLUGIN_URL . 'modules/tur-split-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-split-calc">
        <h3>Tur (Split) Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sc-dist">Toplam Mesafe (Metre):</label>
            <input type="number" id="hc-sc-dist" placeholder="5000">
        </div>
        <div class="hc-form-group">
            <label for="hc-sc-split">Split Mesafesi (Metre):</label>
            <input type="number" id="hc-sc-split" placeholder="400">
            <small>Örn: Atletizm pisti için 400 girin.</small>
        </div>
        <div class="hc-form-group">
            <label>Hedef Toplam Süre (dk:sn):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-sc-min" placeholder="20" style="flex:1;">
                <input type="number" id="hc-sc-sec" placeholder="00" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcSplitCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-split-calc-result">
            <strong>Gereken Tur Süresi:</strong>
            <div id="hc-sc-res-val" class="hc-result-value">-</div>
            <span>dk : sn</span>
        </div>
    </div>
    <?php
}
