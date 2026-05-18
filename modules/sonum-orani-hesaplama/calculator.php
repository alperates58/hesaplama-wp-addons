<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sonum_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sonum-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/sonum-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sonum-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sonum-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sonum-orani-hesaplama">
        <div class="hc-cal-header">
            <h3>Sönüm Oranı Hesaplama</h3>
            <p>Bir mekanik titreşim sisteminin kütle (m), yay sabiti (k) ve sönüm katsayısı (c) parametrelerini kullanarak sönüm oranını (ζ) hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-so-m">Kütle (m - kilogram - kg)</label>
            <input type="number" id="hc-so-m" class="hc-input" placeholder="örn. 10" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-so-k">Yay Katsayısı / Sabiti (k - N/m)</label>
            <input type="number" id="hc-so-k" class="hc-input" placeholder="örn. 250" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-so-c">Sönüm Katsayısı (c - N·s/m)</label>
            <input type="number" id="hc-so-c" class="hc-input" placeholder="örn. 40" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSonumOraniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sonum-orani-hesaplama-result">
            <div class="hc-result-title">Sistem Titreşim Analizi</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Sönüm Oranı (ζ - Zeta):</span>
                <span class="hc-result-value" id="hc-so-res-zeta">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kritik Sönüm Katsayısı (c_c):</span>
                <span class="hc-result-value" id="hc-so-res-cc">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Sönüm Durumu (Rejim):</span>
                <span class="hc-result-value" id="hc-so-res-regime">-</span>
            </div>
            <div class="hc-result-desc" id="hc-so-desc"></div>
        </div>
    </div>
    <?php
}
