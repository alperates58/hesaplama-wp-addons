<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_arac_toplam_sahip_olma_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-tco-calc',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-toplam-sahip-olma-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-etco-box">
        <h3>Elektrikli Araç TCO Hesaplama</h3>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group"><label>EV Alış Fiyatı (TL)</label><input type="number" id="hc-etco-price"></div>
            <div class="hc-form-group"><label>Kullanım Süresi (Yıl)</label><input type="number" id="hc-etco-years" value="5"></div>
            <div class="hc-form-group"><label>Yıllık Ortalama KM</label><input type="number" id="hc-etco-km" value="15000"></div>
            <div class="hc-form-group"><label>Ortalama Tüketim (kWh/100km)</label><input type="number" step="0.1" id="hc-etco-cons" value="18"></div>
            <div class="hc-form-group"><label>Ort. kWh Fiyatı (TL)</label><input type="number" id="hc-etco-elec-price" value="3.5"></div>
            <div class="hc-form-group"><label>Yıllık Bakım (TL)</label><input type="number" id="hc-etco-maint" value="5000"></div>
            <div class="hc-form-group"><label>Yıllık MTV + Sigorta (TL)</label><input type="number" id="hc-etco-tax" value="20000"></div>
            <div class="hc-form-group"><label>Tahmini Satış Değeri (TL)</label><input type="number" id="hc-etco-resale"></div>
        </div>
        <button class="hc-btn" onclick="hcEtcoHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-etco-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Toplam Net Maliyet:</strong><br><span id="hc-etco-total">-</span></div>
                <div><strong>Aylık Maliyet:</strong><br><span id="hc-etco-monthly">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
