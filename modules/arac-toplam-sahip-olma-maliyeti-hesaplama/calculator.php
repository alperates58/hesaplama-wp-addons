<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arac_toplam_sahip_olma_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tco-calc',
        HC_PLUGIN_URL . 'modules/arac-toplam-sahip-olma-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tco-box">
        <h3>Araç Toplam Sahip Olma Maliyeti (TCO)</h3>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group"><label>Araç Alış Fiyatı (TL)</label><input type="number" id="hc-tco-buy-price"></div>
            <div class="hc-form-group"><label>Kullanım Süresi (Yıl)</label><input type="number" id="hc-tco-years" value="5"></div>
            <div class="hc-form-group"><label>Yıllık Ortalama KM</label><input type="number" id="hc-tco-km" value="15000"></div>
            <div class="hc-form-group"><label>Ortalama Yakıt (L/100km)</label><input type="number" step="0.1" id="hc-tco-fuel-cons" value="6.5"></div>
            <div class="hc-form-group"><label>Yakıt Litre Fiyatı (TL)</label><input type="number" id="hc-tco-fuel-price" placeholder="Güncel fiyat"></div>
            <div class="hc-form-group"><label>Yıllık Servis + Bakım (TL)</label><input type="number" id="hc-tco-maint" value="15000"></div>
            <div class="hc-form-group"><label>Yıllık MTV + Sigorta (TL)</label><input type="number" id="hc-tco-tax" value="25000"></div>
            <div class="hc-form-group"><label>Vade Sonu Tahmini Satış (TL)</label><input type="number" id="hc-tco-resale"></div>
        </div>
        <button class="hc-btn" onclick="hcTcoHesapla()">Tüm Maliyeti Hesapla</button>
        <div class="hc-result" id="hc-tco-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Toplam Net Gider:</strong><br><span id="hc-tco-total-net">-</span></div>
                <div><strong>Aylık Ortalama Maliyet:</strong><br><span id="hc-tco-monthly">-</span></div>
                <div><strong>KM Başına Maliyet:</strong><br><span id="hc-tco-per-km">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
