<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_soguk_zincir_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cold-chain',
        HC_PLUGIN_URL . 'modules/soguk-zincir-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cold-chain-css',
        HC_PLUGIN_URL . 'modules/soguk-zincir-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cold-chain">
        <h3>Soğuk Zincir Dayanım Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-cc-ti">Ürün Mevcut Sıcaklığı [°C]</label>
            <input type="number" id="hc-cc-ti" value="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-tmax">Maksimum Güvenli Sıcaklık [°C]</label>
            <input type="number" id="hc-cc-tmax" value="8">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-ta">Ortam Sıcaklığı [°C]</label>
            <input type="number" id="hc-cc-ta" value="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-u">Yalıtım Katsayısı (U) [W/m²K]</label>
            <input type="number" id="hc-cc-u" value="0.5" step="0.1">
            <small>Yüksek yalıtım: 0.2, Standart: 0.5-1.0</small>
        </div>
        <button class="hc-btn" onclick="hcColdChainHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-cold-chain-result">
            <div class="hc-result-item">
                <span>Dayanım Süresi:</span>
                <span class="hc-result-value" id="hc-res-cc-val">0 saat</span>
            </div>
            <p class="hc-cc-note">Basitleştirilmiş ısıl denge modeli kullanılmıştır.</p>
        </div>
    </div>
    <?php
}
