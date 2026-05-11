<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beklenen_parasal_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beklenen-parasal-deger-hesaplama',
        HC_PLUGIN_URL . 'modules/beklenen-parasal-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beklenen-parasal-deger-hesaplama-css',
        HC_PLUGIN_URL . 'modules/beklenen-parasal-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beklenen-parasal-deger">
        <h3>Beklenen Parasal Değer Hesaplama (EMV)</h3>
        <div id="hc-emv-scenarios">
            <div class="hc-emv-scenario">
                <div class="hc-form-group">
                    <label>Senaryo 1 Olasılığı (%)</label>
                    <input type="number" class="hc-emv-prob" placeholder="Örn: 60" step="1">
                </div>
                <div class="hc-form-group">
                    <label>Senaryo 1 Tutarı (₺)</label>
                    <input type="number" class="hc-emv-impact" placeholder="Örn: 10.000">
                </div>
            </div>
            <div class="hc-emv-scenario">
                <div class="hc-form-group">
                    <label>Senaryo 2 Olasılığı (%)</label>
                    <input type="number" class="hc-emv-prob" placeholder="Örn: 40" step="1">
                </div>
                <div class="hc-form-group">
                    <label>Senaryo 2 Tutarı (₺)</label>
                    <input type="number" class="hc-emv-impact" placeholder="Örn: -5.000">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcBeklenenParasalDeğerHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-emv-result">
            <div class="hc-result-item">
                <span>Beklenen Parasal Değer (EMV):</span>
                <strong class="hc-result-value" id="hc-emv-value">-</strong>
            </div>
            <p class="hc-small-text">Olasılıkların toplamı %100 olmalıdır.</p>
        </div>
    </div>
    <?php
}
