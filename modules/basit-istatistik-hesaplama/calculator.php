<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basit_istatistik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-basic-stats',
        HC_PLUGIN_URL . 'modules/basit-istatistik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-basic-stats-css',
        HC_PLUGIN_URL . 'modules/basit-istatistik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stats">
        <h3>Basit İstatistik Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-st-data">Veri Seti (Virgül, boşluk veya yeni satır ile ayırın)</label>
            <textarea id="hc-st-data" placeholder="Örn: 5, 8, 12, 8, 15, 20" rows="3"></textarea>
        </div>

        <button class="hc-btn" onclick="hcIstatistikHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-st-result">
            <div class="hc-stats-grid">
                <div class="hc-stat-item">
                    <span class="hc-stat-label">Ortalama</span>
                    <span class="hc-stat-value" id="hc-res-st-avg">-</span>
                </div>
                <div class="hc-stat-item">
                    <span class="hc-stat-label">Medyan (Ortanca)</span>
                    <span class="hc-stat-value" id="hc-res-st-med">-</span>
                </div>
                <div class="hc-stat-item">
                    <span class="hc-stat-label">Mod (Tepedeger)</span>
                    <span class="hc-stat-value" id="hc-res-st-mod">-</span>
                </div>
                <div class="hc-stat-item">
                    <span class="hc-stat-label">Standart Sapma</span>
                    <span class="hc-stat-value" id="hc-res-st-std">-</span>
                </div>
                <div class="hc-stat-item">
                    <span class="hc-stat-label">Varyans</span>
                    <span class="hc-stat-value" id="hc-res-st-var">-</span>
                </div>
                <div class="hc-stat-item">
                    <span class="hc-stat-label">Açıklık (Ranj)</span>
                    <span class="hc-stat-value" id="hc-res-st-range">-</span>
                </div>
                <div class="hc-stat-item">
                    <span class="hc-stat-label">Toplam</span>
                    <span class="hc-stat-value" id="hc-res-st-sum">-</span>
                </div>
                <div class="hc-stat-item">
                    <span class="hc-stat-label">Adet (n)</span>
                    <span class="hc-stat-value" id="hc-res-st-count">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
