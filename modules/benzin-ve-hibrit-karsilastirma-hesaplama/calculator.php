<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_benzin_ve_hibrit_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hybrid-petrol-calc',
        HC_PLUGIN_URL . 'modules/benzin-ve-hibrit-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hbc-box">
        <h3>Benzin ve Hibrit Karşılaştırma</h3>
        <div class="hc-form-group">
            <label>Araç Fiyat Farkı (Hibrit - Benzinli) (TL)</label>
            <input type="number" id="hc-hbc-diff" placeholder="Örn: 300.000">
        </div>
        <div class="hc-form-group">
            <label>Yıllık Ortalama KM</label>
            <input type="number" id="hc-hbc-km" value="15000">
        </div>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
            <div class="hc-form-group"><label>Benzin Cons (L/100km)</label><input type="number" step="0.1" id="hc-hbc-p-cons" value="7.5"></div>
            <div class="hc-form-group"><label>Hibrit Cons (L/100km)</label><input type="number" step="0.1" id="hc-hbc-h-cons" value="4.5"></div>
            <div class="hc-form-group" style="grid-column: span 2;"><label>Yakıt Fiyatı (TL)</label><input type="number" step="0.01" id="hc-hbc-price"></div>
        </div>
        <button class="hc-btn" onclick="hcHbcHesapla()">Karşılaştır</button>
        <div class="hc-result" id="hc-hbc-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Yıllık Tasarruf:</strong><br><span id="hc-hbc-saving">-</span></div>
                <div><strong>Amortisman Süresi:</strong><br><span id="hc-hbc-payback">-</span></div>
            </div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* Hibrit araçlar özellikle şehir içi trafikte daha yüksek tasarruf sağlar.</p>
        </div>
    </div>
    <?php
}
