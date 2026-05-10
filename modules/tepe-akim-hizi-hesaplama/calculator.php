<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tepe_akim_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tepe-akim-hizi',
        HC_PLUGIN_URL . 'modules/tepe-akim-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tepe-akim-hizi-css',
        HC_PLUGIN_URL . 'modules/tepe-akim-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tepe-akim-hizi">
        <h3>Tepe Akım Hızı (PEF) Hesaplama</h3>
        <div class="hc-form-group">
            <label>Cinsiyet:</label>
            <div style="display:flex; gap:10px;">
                <label><input type="radio" name="hc-pef-gender" value="male" checked> Erkek</label>
                <label><input type="radio" name="hc-pef-gender" value="female"> Kadın</label>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-pef-age">Yaş:</label>
            <input type="number" id="hc-pef-age" placeholder="Örn: 30">
        </div>
        <div class="hc-form-group">
            <label for="hc-pef-height">Boy (cm):</label>
            <input type="number" id="hc-pef-height" placeholder="Örn: 175">
        </div>
        <button class="hc-btn" onclick="hcTepeAkimHiziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tepe-akim-hizi-result">
            <strong>Tahmini PEF Değeri:</strong>
            <div id="hc-pef-res-val" class="hc-result-value">-</div>
            <span>L/dakika</span>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">Not: Bu hesaplama Avrupa Solunum Derneği (ERS) standartlarına dayanan tahmini değerdir.</p>
        </div>
    </div>
    <?php
}
