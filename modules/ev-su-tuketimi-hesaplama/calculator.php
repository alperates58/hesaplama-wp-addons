<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ev_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-house-water',
        HC_PLUGIN_URL . 'modules/ev-su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-house-water-css',
        HC_PLUGIN_URL . 'modules/ev-su-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-house-water">
        <h3>Ev Su Tüketimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-water-people">Evdeki Kişi Sayısı</label>
            <input type="number" id="hc-water-people" value="3" min="1">
        </div>
        <div class="hc-form-group">
            <label>Günlük Kullanım Tahminleri</label>
            <div class="hc-water-row">
                <span>Duş Süresi (Dk/Kişi):</span>
                <input type="number" id="hc-water-shower" value="8" min="0">
            </div>
            <div class="hc-water-row">
                <span>Rezervuar Kullanımı (Adet/Kişi):</span>
                <input type="number" id="hc-water-toilet" value="5" min="0">
            </div>
            <div class="hc-water-row">
                <span>Musluk Kullanımı (Dk/Kişi):</span>
                <input type="number" id="hc-water-faucet" value="3" min="0">
            </div>
        </div>
        <button class="hc-btn" onclick="hcEvSuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ev-su-tuketimi-result">
            <div class="hc-result-item">
                <span>Günlük Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-water-daily">0 Litre</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Toplam Tüketim:</span>
                <span id="hc-res-water-monthly">0 m³</span>
            </div>
        </div>
    </div>
    <?php
}
