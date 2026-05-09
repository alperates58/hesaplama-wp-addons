<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_anket_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-survey-calc',
        HC_PLUGIN_URL . 'modules/anket-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-survey-calc-css',
        HC_PLUGIN_URL . 'modules/anket-yuzdesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-survey">
        <h3>Anket Yüzdesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sy-count">Cevap Veren Sayısı (n)</label>
            <input type="number" id="hc-sy-count" placeholder="Örn: 150" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sy-total">Toplam Katılımcı Sayısı (N)</label>
            <input type="number" id="hc-sy-total" placeholder="Örn: 500" step="1">
        </div>

        <button class="hc-btn" onclick="hcAnketHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sy-result">
            <div class="hc-result-item">
                <span>Yüzde Oranı:</span>
                <span class="hc-result-value highlight" id="hc-res-sy-perc">-</span>
            </div>
            <div class="hc-result-item">
                <span>Hata Payı (±%):</span>
                <span class="hc-result-value" id="hc-res-sy-margin">-</span>
            </div>
            <div class="hc-result-note">
                * Hata payı %95 güven düzeyine göre hesaplanmıştır.
            </div>
        </div>
    </div>
    <?php
}
