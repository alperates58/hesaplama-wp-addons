<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saas_metrikleri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-saas-metrikleri',
        HC_PLUGIN_URL . 'modules/saas-metrikleri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-saas-metrikleri-css',
        HC_PLUGIN_URL . 'modules/saas-metrikleri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-saas">
        <h3>SaaS Temel Metrikleri</h3>
        <div class="hc-form-group">
            <label for="hc-sm-subscribers">Toplam Abone Sayısı</label>
            <input type="number" id="hc-sm-subscribers" placeholder="Örn: 500">
        </div>
        <div class="hc-form-group">
            <label for="hc-sm-arpu">Abone Başı Ortalama Gelir (ARPU ₺)</label>
            <input type="number" id="hc-sm-arpu" placeholder="Örn: 200">
        </div>
        <div class="hc-form-group">
            <label for="hc-sm-churn-lost">Ay İçinde Kaybedilen Abone</label>
            <input type="number" id="hc-sm-churn-lost" placeholder="Örn: 10">
        </div>
        <button class="hc-btn" onclick="hcSaasMetrikleriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sm-result">
            <div class="hc-result-item">
                <span>Aylık Tekrarlayan Gelir (MRR):</span>
                <strong id="hc-sm-res-mrr">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kayıp Oranı (Churn Rate):</span>
                <strong id="hc-sm-res-churn">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Tahmini Gelir (ARR):</span>
                <strong class="hc-result-value" id="hc-sm-res-arr">-</strong>
            </div>
        </div>
    </div>
    <?php
}
