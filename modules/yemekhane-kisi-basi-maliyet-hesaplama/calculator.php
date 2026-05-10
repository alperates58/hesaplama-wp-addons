<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yemekhane_kisi_basi_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cafeteria-cost',
        HC_PLUGIN_URL . 'modules/yemekhane-kisi-basi-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cafeteria-cost-calc">
        <h3>Yemekhane Birim Maliyet</h3>
        <div class="hc-form-group">
            <label for="hc-ck-total">Toplam Giderler (Malzeme+İşçilik+Enerji) (₺):</label>
            <input type="number" id="hc-ck-total" placeholder="50000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ck-people">Toplam Kişi Sayısı:</label>
            <input type="number" id="hc-ck-people" placeholder="500">
        </div>
        <button class="hc-btn" onclick="hcCafeteriaCostHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cafeteria-cost-result">
            <strong>Kişi Başı Maliyet:</strong>
            <div id="hc-ck-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
