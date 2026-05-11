<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_debi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-debi',
        HC_PLUGIN_URL . 'modules/debi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-debi">
        <h3>Debi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Hesaplama Yöntemi</label>
            <select id="hc-debi-metot" onchange="hcDebiMetotDegistir()">
                <option value="hacim">Hacim / Zaman</option>
                <option value="hiz">Kesit Alanı / Hız</option>
            </select>
        </div>
        
        <div id="hc-debi-hacim-grup">
            <div class="hc-form-group">
                <label>Hacim (V, m³)</label>
                <input type="number" id="hc-debi-v" placeholder="m³" step="0.1">
            </div>
            <div class="hc-form-group">
                <label>Zaman (t, saniye)</label>
                <input type="number" id="hc-debi-t" placeholder="saniye" step="1">
            </div>
        </div>
        
        <div id="hc-debi-hiz-grup" style="display:none;">
            <div class="hc-form-group">
                <label>Kesit Alanı (A, m²)</label>
                <input type="number" id="hc-debi-a" placeholder="m²" step="0.01">
            </div>
            <div class="hc-form-group">
                <label>Akış Hızı (v, m/s)</label>
                <input type="number" id="hc-debi-vhiz" placeholder="m/s" step="0.1">
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcDebiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-debi-result">
            <span>Hesaplanan Debi (Q):</span>
            <div class="hc-result-value" id="hc-debi-res-m3s">0 m³/sn</div>
            <div id="hc-debi-res-ls" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 L/sn</div>
            <div id="hc-debi-res-m3h" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 m³/saat</div>
        </div>
    </div>
    <?php
}
