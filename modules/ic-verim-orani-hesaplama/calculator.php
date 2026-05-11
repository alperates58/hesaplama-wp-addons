<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ic_verim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-irr-calc',
        HC_PLUGIN_URL . 'modules/ic-verim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-irr-calc-css',
        HC_PLUGIN_URL . 'modules/ic-verim-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-irr">
        <h3>İç Verim Oranı (IRR) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-irr-initial">İlk Yatırım Tutarı (₺)</label>
            <input type="number" id="hc-irr-initial" placeholder="Örn: 100.000">
        </div>
        <div id="hc-irr-cashflows">
            <div class="hc-irr-row">
                <label>1. Yıl Nakit Akışı (₺)</label>
                <input type="number" class="hc-irr-cf" placeholder="₺">
            </div>
            <div class="hc-irr-row">
                <label>2. Yıl Nakit Akışı (₺)</label>
                <input type="number" class="hc-irr-cf" placeholder="₺">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcIrrSatirEkle()" style="margin-bottom: 15px;">+ Yıl Ekle</button>
        <button class="hc-btn" onclick="hcIrrHesapla()">IRR Hesapla</button>
        <div class="hc-result" id="hc-irr-result">
            <div class="hc-result-item">
                <span>İç Verim Oranı (IRR):</span>
                <strong class="hc-result-value" id="hc-irr-res-total">-</strong>
            </div>
            <p class="hc-small-text">IRR, yatırımın yıllık bileşik getiri oranıdır.</p>
        </div>
    </div>
    <?php
}
