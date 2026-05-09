<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ikinci_el_arac_fiyat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-used-price',
        HC_PLUGIN_URL . 'modules/ikinci-el-arac-fiyat-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-up-calc">
        <h3>İkinci El Araç Fiyat Tahmini</h3>
        <div class="hc-form-group">
            <label>Araç Sıfır Liste Fiyatı (TL)</label>
            <input type="number" id="hc-up-new-price" placeholder="Örn: 1.500.000">
        </div>
        <div class="hc-form-group">
            <label>Araç Yaşı</label>
            <input type="number" id="hc-up-age" value="3">
        </div>
        <div class="hc-form-group">
            <label>Araç Kilometresi (km)</label>
            <input type="number" id="hc-up-km" placeholder="Örn: 60.000">
        </div>
        <div class="hc-form-group">
            <label>Araç Kondisyonu</label>
            <select id="hc-up-condition">
                <option value="1.0">Mükemmel (Hatasız/Boyasız)</option>
                <option value="0.95" selected>Çok İyi (1-2 Parça Boya)</option>
                <option value="0.88">İyi (Birkaç Değişen/Boya)</option>
                <option value="0.75">Yıpranmış (Ağır İşlemli)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcUpHesapla()">Değerini Hesapla</button>
        <div class="hc-result" id="hc-up-result">
            <div class="hc-result-title">Tahmini İkinci El Değeri:</div>
            <div class="hc-result-value" id="hc-up-val">-</div>
        </div>
    </div>
    <?php
}
