<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_biyolojik_oksijen_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boi',
        HC_PLUGIN_URL . 'modules/biyolojik-oksijen-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-boi-css',
        HC_PLUGIN_URL . 'modules/biyolojik-oksijen-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-boi">
        <h3>BOİ₅ (Biyolojik Oksijen İhtiyacı) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-boi-d1">Başlangıç Çözünmüş Oksijen (D₁ - mg/L)</label>
            <input type="number" id="hc-boi-d1" placeholder="Örn: 8.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-boi-d2">5. Gün Çözünmüş Oksijen (D₂ - mg/L)</label>
            <input type="number" id="hc-boi-d2" placeholder="Örn: 4.2" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-boi-f">Seyreltme Faktörü (P)</label>
            <input type="number" id="hc-boi-f" placeholder="Örn: 100" value="1" step="any">
        </div>
        <button class="hc-btn" onclick="hcBOIHesapla()">BOİ₅ Hesapla</button>
        <div class="hc-result" id="hc-boi-result">
            <div class="hc-result-label">BOİ₅ Değeri:</div>
            <div class="hc-result-value" id="hc-boi-val">-</div>
            <div class="hc-result-note">BOİ₅ = (D₁ - D₂) / P</div>
        </div>
    </div>
    <?php
}
