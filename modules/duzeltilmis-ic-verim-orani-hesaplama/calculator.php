<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_duzeltilmis_ic_verim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mirr-calc',
        HC_PLUGIN_URL . 'modules/duzeltilmis-ic-verim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mirr-calc-css',
        HC_PLUGIN_URL . 'modules/duzeltilmis-ic-verim-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mirr">
        <h3>Düzeltilmiş İç Verim Oranı (MIRR)</h3>
        <div class="hc-form-group">
            <label for="hc-mirr-initial">İlk Yatırım Tutarı (₺)</label>
            <input type="number" id="hc-mirr-initial" placeholder="Örn: 100.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-mirr-fin">Finansman Maliyeti Oranı (%)</label>
            <input type="number" id="hc-mirr-fin" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-mirr-rein">Yeniden Yatırım Getiri Oranı (%)</label>
            <input type="number" id="hc-mirr-rein" placeholder="Örn: 15">
        </div>
        <div id="hc-mirr-cashflows">
            <div class="hc-mirr-row">
                <label>1. Yıl Nakit Akışı (₺)</label>
                <input type="number" class="hc-mirr-cf" placeholder="₺">
            </div>
            <div class="hc-mirr-row">
                <label>2. Yıl Nakit Akışı (₺)</label>
                <input type="number" class="hc-mirr-cf" placeholder="₺">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcMirrSatirEkle()" style="margin-bottom: 15px;">+ Yıl Ekle</button>
        <button class="hc-btn" onclick="hcMirrHesapla()">MIRR Hesapla</button>
        <div class="hc-result" id="hc-mirr-result">
            <div class="hc-result-item">
                <span>Düzeltilmiş İç Verim Oranı (MIRR):</span>
                <strong class="hc-result-value" id="hc-mirr-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
