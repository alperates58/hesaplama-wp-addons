<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sporla_kilo_verme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sport-weightloss',
        HC_PLUGIN_URL . 'modules/sporla-kilo-verme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sport-weightloss-css',
        HC_PLUGIN_URL . 'modules/sporla-kilo-verme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sport-weightloss">
        <h3>Sporla Kilo Verme Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sw-target">Hedef Kilo Kaybı (kg)</label>
            <input type="number" id="hc-sw-target" value="1" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sw-weight">Mevcut Ağırlık (kg)</label>
            <input type="number" id="hc-sw-weight" value="70">
        </div>

        <div class="hc-form-group">
            <label for="hc-sw-activity">Yapılacak Spor</label>
            <select id="hc-sw-activity">
                <option value="8.3">Koşu (8 km/s)</option>
                <option value="5.0">Hızlı Yürüyüş</option>
                <option value="7.5">Bisiklet</option>
                <option value="5.8">Yüzme</option>
                <option value="8.0">Fitness / Kardiyo</option>
                <option value="10.0">İp Atlama</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sw-daily">Günlük Egzersiz Süresi (Dakika)</label>
            <input type="number" id="hc-sw-daily" value="45">
        </div>
        
        <button class="hc-btn" onclick="hcSportWeightLossHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sport-weightloss-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Enerji:</span>
                <strong id="hc-sw-res-total-kcal">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Süre:</span>
                <strong id="hc-sw-res-days">-</strong>
            </div>
            <div class="hc-result-value" id="hc-sw-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.85em; color: #666; margin-top: 10px;">Hedefe ulaşmak için gereken toplam egzersiz saati.</p>
        </div>
    </div>
    <?php
}
