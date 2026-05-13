<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lognormal_dagilim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lognormal-dagilim-hesaplama',
        HC_PLUGIN_URL . 'modules/lognormal-dagilim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lognormal-dagilim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/lognormal-dagilim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lognormal-dagilim">
        <h3>Lognormal Dağılım Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ln-x">Değişken (x) (x > 0):</label>
            <input type="number" id="hc-ln-x" class="hc-input" step="any" placeholder="Örn: 2">
        </div>
        <div class="hc-form-group">
            <label for="hc-ln-mu">Konum Parametresi (μ):</label>
            <input type="number" id="hc-ln-mu" class="hc-input" step="any" placeholder="Örn: 0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ln-sigma">Ölçek Parametresi (σ) (σ > 0):</label>
            <input type="number" id="hc-ln-sigma" class="hc-input" step="any" placeholder="Örn: 0.25">
        </div>
        <button class="hc-btn" onclick="hcLognormalHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lognormal-dagilim-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>PDF f(x):</span>
                    <strong id="hc-res-ln-pdf">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Ortalama (E[X]):</span>
                    <strong id="hc-res-ln-mean">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Varyans:</span>
                    <strong id="hc-res-ln-var">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Medyan:</span>
                    <strong id="hc-res-ln-median">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
