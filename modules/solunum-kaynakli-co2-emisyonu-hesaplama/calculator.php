<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_solunum_kaynakli_co2_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solunum-kaynakli-co2-emisyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/solunum-kaynakli-co2-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solunum-kaynakli-co2-emisyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/solunum-kaynakli-co2-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-breath-co2">
        <h3>Solunum Kaynaklı CO₂ Üretimi</h3>
        <div class="hc-form-group">
            <label for="hc-bc-persons">Kişi Sayısı</label>
            <input type="number" id="hc-bc-persons" value="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-bc-activity">Aktivite Seviyesi</label>
            <select id="hc-bc-activity">
                <option value="0.7">Dinlenme / Uyku (0.7 kg/gün)</option>
                <option value="1.0" selected>Hafif Aktivite (1.0 kg/gün)</option>
                <option value="2.5">Yoğun Egzersiz (2.5 kg/gün)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSolunumKaynaklıCO2EmisyonuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bc-result">
            <div class="hc-result-label">Günlük Toplam CO₂ Üretimi:</div>
            <div class="hc-result-value" id="hc-bc-val">-</div>
        </div>
    </div>
    <?php
}
