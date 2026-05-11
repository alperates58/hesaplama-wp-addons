<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekran_cozunurlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ekran-coz',
        HC_PLUGIN_URL . 'modules/ekran-cozunurlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ekran-coz">
        <h3>Ekran Çözünürlüğü ve PPI Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Yatay Piksel Sayısı (Genişlik)</label>
            <input type="number" id="hc-ec-w" placeholder="Örn: 1920" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Dikey Piksel Sayısı (Yükseklik)</label>
            <input type="number" id="hc-ec-h" placeholder="Örn: 1080" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Ekran Köşegen Uzunluğu (cm)</label>
            <input type="number" id="hc-ec-d" placeholder="cm" step="0.1">
            <small>Not: 1 inç = 2.54 cm. (Örn: 15.6 inç ≈ 39.6 cm)</small>
        </div>
        
        <button class="hc-btn" onclick="hcEkranCozHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ec-result">
            <span>Hesaplama Sonuçları:</span>
            <div class="hc-result-value" id="hc-ec-res-ppi">0 PPI</div>
            <div id="hc-ec-res-total" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Toplam Piksel: 0</div>
            <div id="hc-ec-res-ratio" style="margin-top:5px; font-size:0.9em; opacity:0.8;">En-Boy Oranı: -</div>
        </div>
    </div>
    <?php
}
