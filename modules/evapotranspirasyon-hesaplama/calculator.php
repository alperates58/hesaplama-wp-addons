<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_evapotranspirasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-evapotranspirasyon-hesaplama',
        HC_PLUGIN_URL . 'modules/evapotranspirasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-evapotranspirasyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/evapotranspirasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-evapotranspirasyon-hesaplama">
        <h3>Evapotranspirasyon (ETo) Hesaplama</h3>
        <p style="font-size: 0.85em; margin-bottom: 15px; opacity: 0.8;">Blaney-Criddle yöntemi ile günlük su tüketimi hesabı.</p>
        <div class="hc-form-group">
            <label for="hc-et-temp">Ortalama Sıcaklık (°C)</label>
            <input type="number" id="hc-et-temp" placeholder="Örn: 25" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-et-p">Günlük Gündüz Süresi Yüzdesi (p)</label>
            <input type="number" id="hc-et-p" placeholder="Örn: 0.27" step="any">
            <small style="display:block; margin-top:5px; opacity:0.7;">Türkiye için yaz aylarında genelde 0.27 - 0.32 arasıdır.</small>
        </div>
        <button class="hc-btn" onclick="hcEvapotranspirasyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-et-result">
            <div class="hc-result-label">Günlük ETo:</div>
            <div class="hc-result-value" id="hc-et-val">-</div>
            <div class="hc-result-note">ETo = p * (0.46 * T + 8) mm/gün</div>
        </div>
    </div>
    <?php
}
