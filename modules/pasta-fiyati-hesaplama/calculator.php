<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pasta_fiyati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cake-pricing',
        HC_PLUGIN_URL . 'modules/pasta-fiyati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cake-price-calc">
        <h3>Butik Pasta Fiyat Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cp-material">Toplam Malzeme Maliyeti (₺):</label>
            <input type="number" id="hc-cp-material" placeholder="200">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-labor">Tahmini İşçilik Süresi (Saat):</label>
            <input type="number" id="hc-cp-labor" placeholder="3">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-hourly">Saatlik İşçilik Ücreti (₺):</label>
            <input type="number" id="hc-cp-hourly" value="150">
        </div>
        <button class="hc-btn" onclick="hcCakePriceHesapla()">Fiyatı Hesapla</button>
        <div class="hc-result" id="hc-cake-price-result">
            <strong>Önerilen Satış Fiyatı:</strong>
            <div id="hc-cp-val" class="hc-result-value">-</div>
            <p id="hc-cp-info"></p>
        </div>
    </div>
    <?php
}
