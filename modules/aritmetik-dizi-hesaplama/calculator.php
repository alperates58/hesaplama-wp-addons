<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aritmetik_dizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-arithmetic-seq',
        HC_PLUGIN_URL . 'modules/aritmetik-dizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-arithmetic-seq-css',
        HC_PLUGIN_URL . 'modules/aritmetik-dizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-arith-seq">
        <h3>Aritmetik Dizi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-as-a1">İlk Terim (a₁)</label>
            <input type="number" id="hc-as-a1" placeholder="Örn: 5" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-as-d">Ortak Fark (d)</label>
            <input type="number" id="hc-as-d" placeholder="Örn: 3" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-as-n">Terim Sayısı (n)</label>
            <input type="number" id="hc-as-n" placeholder="Örn: 10" step="1">
        </div>

        <button class="hc-btn" onclick="hcAritmetikDiziHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-as-result">
            <div class="hc-result-item">
                <span>n. Terim (aₙ):</span>
                <span class="hc-result-value highlight" id="hc-res-as-an">-</span>
            </div>
            <div class="hc-result-item">
                <span>İlk n Terim Toplamı (Sₙ):</span>
                <span class="hc-result-value" id="hc-res-as-sn">-</span>
            </div>
        </div>
    </div>
    <?php
}
