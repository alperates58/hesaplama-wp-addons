<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_jenerator_yakit_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gen-fuel',
        HC_PLUGIN_URL . 'modules/jenerator-yakit-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gen-fuel-css',
        HC_PLUGIN_URL . 'modules/jenerator-yakit-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gen-fuel">
        <h3>Jeneratör Yakıt Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-gf-power">Jeneratör Gücü (kVA)</label>
            <input type="number" id="hc-gf-power" placeholder="Örn: 10" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-gf-hours">Çalışma Süresi (Saat)</label>
            <input type="number" id="hc-gf-hours" placeholder="Örn: 8" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-gf-fuel-price">Yakıt Litre Fiyatı (₺)</label>
            <input type="number" id="hc-gf-fuel-price" value="55.00" step="0.1">
            <small>2026 tahmini motorin fiyatı.</small>
        </div>

        <button class="hc-btn" onclick="hcJenYakitHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gf-result">
            <div class="hc-result-item">
                <span>Toplam Yakıt Tüketimi:</span>
                <span class="hc-result-value" id="hc-res-gf-liters">-</span>
            </div>
            <div class="hc-result-item">
                <span>Toplam Yakıt Maliyeti:</span>
                <span class="hc-result-value highlight" id="hc-res-gf-cost">-</span>
            </div>
            <div class="hc-result-note">
                * Tüketim, dizel jeneratörler için %75 yük ortalaması (0.21 L/kVA/saat) baz alınarak hesaplanmıştır.
            </div>
        </div>
    </div>
    <?php
}
