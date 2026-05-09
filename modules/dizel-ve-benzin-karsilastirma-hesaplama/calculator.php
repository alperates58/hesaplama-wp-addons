<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dizel_ve_benzin_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-diesel-petrol-calc',
        HC_PLUGIN_URL . 'modules/dizel-ve-benzin-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dbc-box">
        <h3>Dizel ve Benzin Karşılaştırma</h3>
        <div class="hc-form-group">
            <label>Araç Fiyat Farkı (Dizel - Benzinli) (TL)</label>
            <input type="number" id="hc-dbc-diff" placeholder="Örn: 200.000">
        </div>
        <div class="hc-form-group">
            <label>Yıllık Ortalama KM</label>
            <input type="number" id="hc-dbc-km" value="15000">
        </div>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
            <div class="hc-form-group"><label>Benzin Cons (L/100km)</label><input type="number" step="0.1" id="hc-dbc-p-cons" value="7.5"></div>
            <div class="hc-form-group"><label>Dizel Cons (L/100km)</label><input type="number" step="0.1" id="hc-dbc-d-cons" value="5.5"></div>
            <div class="hc-form-group"><label>Benzin Fiyatı (TL)</label><input type="number" step="0.01" id="hc-dbc-p-price"></div>
            <div class="hc-form-group"><label>Dizel Fiyatı (TL)</label><input type="number" step="0.01" id="hc-dbc-d-price"></div>
        </div>
        <button class="hc-btn" onclick="hcDbcHesapla()">Karşılaştır</button>
        <div class="hc-result" id="hc-dbc-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Yıllık Tasarruf:</strong><br><span id="hc-dbc-saving">-</span></div>
                <div><strong>Amortisman Süresi:</strong><br><span id="hc-dbc-payback">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
