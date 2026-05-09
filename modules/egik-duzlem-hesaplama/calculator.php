<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_egik_duzlem_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-egik-duzlem-hesaplama',
        HC_PLUGIN_URL . 'modules/egik-duzlem-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-egik-duzlem-hesaplama-css',
        HC_PLUGIN_URL . 'modules/egik-duzlem-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-egik-duzlem-hesaplama">
        <h3>Eğik Düzlem Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ed-mass">Kütle (m - kg)</label>
            <input type="number" id="hc-ed-mass" placeholder="Örn: 5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ed-angle">Eğim Açısı (θ - Derece)</label>
            <input type="number" id="hc-ed-angle" placeholder="Örn: 30" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ed-mu">Sürtünme Katsayısı (μ)</label>
            <input type="number" id="hc-ed-mu" value="0" step="any">
        </div>
        <button class="hc-btn" onclick="hcEDHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ed-result">
            <div class="hc-ed-grid">
                <div class="hc-ed-item">
                    <span class="hc-result-label">Net İvme:</span>
                    <span class="hc-result-value" id="hc-ed-accel">-</span>
                </div>
                <div class="hc-ed-item">
                    <span class="hc-result-label">Paralel Kuvvet (Fₓ):</span>
                    <span class="hc-result-value" id="hc-ed-fx">-</span>
                </div>
            </div>
            <div class="hc-result-note">a = g * (sinθ - μ * cosθ) | g = 9.81 m/s²</div>
        </div>
    </div>
    <?php
}
