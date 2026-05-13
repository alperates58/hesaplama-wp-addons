<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beta_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beta-dagilimi-hesaplama',
        HC_PLUGIN_URL . 'modules/beta-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beta-dagilimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/beta-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beta-calc">
        <h3>Beta Dağılımı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-beta-x">Değer (x) (0 ile 1 arası):</label>
            <input type="number" id="hc-beta-x" class="hc-input" placeholder="Örn: 0.5" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-beta-alpha">Şekil Parametresi (α):</label>
            <input type="number" id="hc-beta-alpha" class="hc-input" placeholder="Örn: 2">
        </div>
        <div class="hc-form-group">
            <label for="hc-beta-beta">Şekil Parametresi (β):</label>
            <input type="number" id="hc-beta-beta" class="hc-input" placeholder="Örn: 2">
        </div>
        <button class="hc-btn" onclick="hcBetaHesapla()">PDF Hesapla</button>
        <div class="hc-result" id="hc-beta-dagilimi-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Olasılık Yoğunluğu f(x):</span>
                    <strong id="hc-res-beta-pdf">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Ortalama:</span>
                    <strong id="hc-res-beta-mean">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Varyans:</span>
                    <strong id="hc-res-beta-var">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
