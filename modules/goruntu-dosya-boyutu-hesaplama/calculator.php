<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_goruntu_dosya_boyutu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-img-size',
        HC_PLUGIN_URL . 'modules/goruntu-dosya-boyutu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-img-size">
        <h3>Görüntü Dosya Boyutu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Genişlik (Piksel)</label>
            <input type="number" id="hc-is-w" placeholder="Örn: 1920" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Yükseklik (Piksel)</label>
            <input type="number" id="hc-is-h" placeholder="Örn: 1080" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Renk Derinliği (Bit)</label>
            <select id="hc-is-bit">
                <option value="8">8-bit (Gri Tonlamalı)</option>
                <option value="24" selected>24-bit (RGB Standard)</option>
                <option value="32">32-bit (RGBA)</option>
                <option value="48">48-bit (Pro Photo)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcImgSizeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-is-result">
            <span>Tahmini Dosya Boyutları:</span>
            <div class="hc-result-value" id="hc-is-res-raw">0 MB (Ham/RAW)</div>
            <div id="hc-is-res-png" style="margin-top:5px; font-size:0.9em; opacity:0.8;">PNG (Kayıpsız Sıkış.): 0 MB</div>
            <div id="hc-is-res-jpg" style="margin-top:5px; font-size:0.9em; opacity:0.8;">JPG (Yüksek Kalite): 0 MB</div>
        </div>
    </div>
    <?php
}
