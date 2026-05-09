<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basit_harmonik_hareket_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-basit-harmonik-hareket-hesaplama',
        HC_PLUGIN_URL . 'modules/basit-harmonik-hareket-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-basit-harmonik-hareket-hesaplama-css',
        HC_PLUGIN_URL . 'modules/basit-harmonik-hareket-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-basit-harmonik-hareket-hesaplama">
        <h3>Basit Harmonik Hareket (Yay)</h3>
        <div class="hc-form-group">
            <label for="hc-bhh-mass">Kütle (m - kg)</label>
            <input type="number" id="hc-bhh-mass" placeholder="Örn: 1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bhh-k">Yay Sabiti (k - N/m)</label>
            <input type="number" id="hc-bhh-k" placeholder="Örn: 100" step="any">
        </div>
        <button class="hc-btn" onclick="hcBHHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bhh-result">
            <div class="hc-bhh-grid">
                <div class="hc-bhh-item">
                    <span class="hc-result-label">Periyot (T):</span>
                    <span class="hc-result-value" id="hc-bhh-period">-</span>
                </div>
                <div class="hc-bhh-item">
                    <span class="hc-result-label">Frekans (f):</span>
                    <span class="hc-result-value" id="hc-bhh-freq">-</span>
                </div>
            </div>
            <div class="hc-result-note">T = 2π * √(m/k)</div>
        </div>
    </div>
    <?php
}
