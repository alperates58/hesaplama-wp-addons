<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_direnc_renk_kodu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-resistor-color',
        HC_PLUGIN_URL . 'modules/direnc-renk-kodu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-resistor-color-css',
        HC_PLUGIN_URL . 'modules/direnc-renk-kodu-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-resistor-color">
        <h3>Direnç Renk Kodu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Bant Sayısı</label>
            <select id="hc-rk-bant-sayisi" onchange="hcRkDegistir()">
                <option value="4">4 Bantlı</option>
                <option value="5">5 Bantlı</option>
            </select>
        </div>
        
        <div id="hc-rk-bands" style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 20px;">
            <div class="hc-form-group">
                <label>1. Bant (1. Rakam)</label>
                <select id="hc-rk-b1" class="hc-rk-select"></select>
            </div>
            <div class="hc-form-group">
                <label>2. Bant (2. Rakam)</label>
                <select id="hc-rk-b2" class="hc-rk-select"></select>
            </div>
            <div id="hc-rk-b3-grup" class="hc-form-group" style="display:none;">
                <label>3. Bant (3. Rakam)</label>
                <select id="hc-rk-b3" class="hc-rk-select"></select>
            </div>
            <div class="hc-form-group">
                <label>Çarpan Bandı</label>
                <select id="hc-rk-mult" class="hc-rk-select"></select>
            </div>
            <div class="hc-form-group">
                <label>Tolerans Bandı</label>
                <select id="hc-rk-tol" class="hc-rk-select"></select>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcResistorColorHesapla()">Direnci Hesapla</button>
        
        <div class="hc-result" id="hc-rk-result">
            <span>Direnç Değeri:</span>
            <div class="hc-result-value" id="hc-rk-res-val">0 Ω</div>
            <div id="hc-rk-res-tol" style="margin-top:5px; font-size:1em;">Tolerans: ±0%</div>
        </div>
    </div>
    <?php
}
