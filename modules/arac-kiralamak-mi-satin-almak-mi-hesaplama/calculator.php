<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arac_kiralamak_mi_satin_almak_mi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rvb-calc',
        HC_PLUGIN_URL . 'modules/arac-kiralamak-mi-satin-almak-mi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-rvb-calc-box">
        <h3>Araç Kiralama vs Satın Alma Karşılaştırması</h3>
        
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="hc-form-section">
                <h4>Satın Alma</h4>
                <div class="hc-form-group">
                    <label>Araç Fiyatı (TL)</label>
                    <input type="number" id="hc-rvb-buy-price" placeholder="Örn: 1.200.000">
                </div>
                <div class="hc-form-group">
                    <label>Yıllık Sigorta + MTV + Bakım (TL)</label>
                    <input type="number" id="hc-rvb-buy-annual-cost" placeholder="Örn: 40.000">
                </div>
                <div class="hc-form-group">
                    <label>Yıl Sonunda Tahmini Satış Değeri (TL)</label>
                    <input type="number" id="hc-rvb-buy-resale" placeholder="Örn: 900.000">
                </div>
            </div>
            
            <div class="hc-form-section">
                <h4>Kiralama</h4>
                <div class="hc-form-group">
                    <label>Aylık Kira Bedeli (TL)</label>
                    <input type="number" id="hc-rvb-rent-monthly" placeholder="Örn: 30.000">
                </div>
                <div class="hc-form-group">
                    <label>Kiralama Süresi (Yıl)</label>
                    <input type="number" id="hc-rvb-rent-years" value="3">
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcRvbHesapla()">Karşılaştır</button>
        
        <div class="hc-result" id="hc-rvb-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Satın Alma Toplam Maliyet:</strong><br><span id="hc-rvb-buy-total">-</span></div>
                <div><strong>Kiralama Toplam Maliyet:</strong><br><span id="hc-rvb-rent-total">-</span></div>
            </div>
            <div id="hc-rvb-winner" style="margin-top: 15px; font-weight: bold; font-size: 18px; text-align: center;"></div>
        </div>
    </div>
    <?php
}
