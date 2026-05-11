<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saas_musteri_yasam_boyu_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-clv-calc',
        HC_PLUGIN_URL . 'modules/saas-musteri-yasam-boyu-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-clv-calc-css',
        HC_PLUGIN_URL . 'modules/saas-musteri-yasam-boyu-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-clv">
        <h3>Müşteri Yaşam Boyu Değeri (LTV / CLV)</h3>
        <div class="hc-form-group">
            <label for="hc-clv-arpu">Aylık Ortalama Abone Geliri (ARPU ₺)</label>
            <input type="number" id="hc-clv-arpu" placeholder="Örn: 250">
        </div>
        <div class="hc-form-group">
            <label for="hc-clv-margin">Brüt Kâr Marjı (%)</label>
            <input type="number" id="hc-clv-margin" value="80">
        </div>
        <div class="hc-form-group">
            <label for="hc-clv-churn">Aylık Kayıp Oranı (Churn Rate %)</label>
            <input type="number" id="hc-clv-churn" placeholder="Örn: 5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcClvHesapla()">LTV Hesapla</button>
        <div class="hc-result" id="hc-clv-result">
            <div class="hc-result-item">
                <span>Ortalama Müşteri Ömrü (Ay):</span>
                <strong id="hc-clv-res-lifespan">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Müşteri Yaşam Boyu Değeri (LTV):</span>
                <strong class="hc-result-value" id="hc-clv-res-value">-</strong>
            </div>
            <p class="hc-small-text">LTV, bir müşterinin aboneliği boyunca size kazandıracağı toplam brüt kârdır.</p>
        </div>
    </div>
    <?php
}
