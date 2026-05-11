<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_biot_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-biot-number',
        HC_PLUGIN_URL . 'modules/biot-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-biot-number">
        <h3>Biot Sayısı Hesaplama</h3>
        <p><small>Bi = (h · L<sub>c</sub>) / k</small></p>
        
        <div class="hc-form-group">
            <label>Taşınım Isı Transfer Katsayısı (h, W/m²K)</label>
            <input type="number" id="hc-bi-h" placeholder="Örn: 50" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Karakteristik Uzunluk (L<sub>c</sub>, metre)</label>
            <input type="number" id="hc-bi-lc" placeholder="Örn: 0.01" step="0.001">
            <small>L<sub>c</sub> = Hacim / Yüzey Alanı</small>
        </div>
        
        <div class="hc-form-group">
            <label>Isıl İletkenlik (k, W/mK)</label>
            <input type="number" id="hc-bi-k" placeholder="Örn: 15" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcBiotHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bi-result">
            <span>Biot Sayısı (Bi):</span>
            <div class="hc-result-value" id="hc-bi-res-val">0</div>
            <div id="hc-bi-res-desc" style="margin-top:5px; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
