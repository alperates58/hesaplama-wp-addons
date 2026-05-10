<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_has_bled_kanama_riski_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-has-bled-kanama-riski-hesaplama',
        HC_PLUGIN_URL . 'modules/has-bled-kanama-riski-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-has-bled-kanama-riski-hesaplama-css',
        HC_PLUGIN_URL . 'modules/has-bled-kanama-riski-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hasbled">
        <h3>HAS-BLED Kanama Riski</h3>
        <div class="hc-form-group">
            <div class="hc-checkbox-group">
                <label><input type="checkbox" class="hc-hb-check"> Hipertansiyon (SBP > 160)</label>
                <label><input type="checkbox" class="hc-hb-check"> Anormal Böbrek Fonksiyonu</label>
                <label><input type="checkbox" class="hc-hb-check"> Anormal Karaciğer Fonksiyonu</label>
                <label><input type="checkbox" class="hc-hb-check"> İnme (Stroke) Geçmişi</label>
                <label><input type="checkbox" class="hc-hb-check"> Kanama Öyküsü veya Eğilimi</label>
                <label><input type="checkbox" class="hc-hb-check"> Labil INR (Kararsız seyir)</label>
                <label><input type="checkbox" class="hc-hb-check"> Yaş > 65</label>
                <label><input type="checkbox" class="hc-hb-check"> İlaç Kullanımı (NSAİİ, Antiplatelet)</label>
                <label><input type="checkbox" class="hc-hb-check"> Alkol Kullanımı (> 8 kadeh/hafta)</label>
            </div>
        </div>
        <button class="hc-btn" onclick="hcHASBLEDHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hb-result">
            <div id="hc-hb-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
