<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ogun_kalorisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ogun-kalorisi',
        HC_PLUGIN_URL . 'modules/ogun-kalorisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ogun-kalorisi">
        <h3>Öğün Kalorisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ok-toplam">Günlük Toplam Kalori Hedefi (kcal)</label>
            <input type="number" id="hc-ok-toplam" placeholder="Örn: 2000">
        </div>

        <div class="hc-form-group">
            <label for="hc-ok-sayi">Günlük Öğün Sayısı</label>
            <input type="range" id="hc-ok-sayi" min="1" max="8" value="3" oninput="this.nextElementSibling.value = this.value">
            <output>3</output>
        </div>

        <button class="hc-btn" onclick="hcOgunKalorisiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ogun-kalorisi-result">
            <div class="hc-result-item">
                <span>Öğün Başına Düşen Kalori (Eşit Dağılım):</span>
                <div class="hc-result-value" id="hc-ok-equal">-</div>
            </div>
            
            <div id="hc-ok-split" style="margin-top: 20px; border-top: 1px dashed #ccc; pt: 15px;">
                <p style="font-weight: bold; margin-bottom: 10px;">Örnek Dağılım (%25 Kahvaltı, %35 Öğle, %30 Akşam, %10 Atıştırmalık):</p>
                <ul id="hc-ok-sample-list" style="list-style: none; padding: 0;">
                    <!-- JS ile doldurulacak -->
                </ul>
            </div>
        </div>
    </div>
    <?php
}
