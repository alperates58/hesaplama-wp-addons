<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_talep_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-demand-forecast',
        HC_PLUGIN_URL . 'modules/talep-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-demand-forecast-css',
        HC_PLUGIN_URL . 'modules/talep-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-demand-forecast">
        <h3>Talep Tahmini (SMA)</h3>
        <div class="hc-form-group">
            <label for="hc-df-data">Geçmiş Dönem Talepleri (Virgül ile)</label>
            <textarea id="hc-df-data" placeholder="Örn: 120, 150, 140, 160"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-df-period">Hareketli Ortalama Dönemi (n)</label>
            <input type="number" id="hc-df-period" value="3" min="1">
        </div>
        <button class="hc-btn" onclick="hcDemandForecastHesapla()">Tahmin Et</button>
        <div class="hc-result" id="hc-demand-forecast-result">
            <div class="hc-result-item">
                <span>Gelecek Dönem Tahmini:</span>
                <span class="hc-result-value" id="hc-res-df-val">0</span>
            </div>
            <p class="hc-df-note">Basit Hareketli Ortalama yöntemi kullanılmıştır.</p>
        </div>
    </div>
    <?php
}
