<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_arac_amortisman_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-payback',
        HC_PLUGIN_URL . 'modules/elektrikli-arac-amortisman-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-eaa-box">
        <h3>EV Amortisman Hesaplama</h3>
        <div class="hc-form-group">
            <label>Araç Fiyat Farkı (EV - Benzinli) (TL)</label>
            <input type="number" id="hc-eaa-diff" placeholder="Örn: 400.000">
        </div>
        <div class="hc-form-group">
            <label>Aylık Tahmini Yakıt Tasarrufu (TL)</label>
            <input type="number" id="hc-eaa-monthly-saving" placeholder="Örn: 8.000">
        </div>
        <button class="hc-btn" onclick="hcEaaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-eaa-result">
            <div class="hc-result-title">Geri Dönüş Süresi:</div>
            <div class="hc-result-value" id="hc-eaa-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* Sadece yakıt tasarrufu baz alınmıştır. Bakım ve vergi avantajları süreyi kısaltabilir.</p>
        </div>
    </div>
    <?php
}
