<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_likidite_oranlari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-liquidity',
        HC_PLUGIN_URL . 'modules/likidite-oranlari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-liquidity-css',
        HC_PLUGIN_URL . 'modules/likidite-oranlari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-liquidity">
        <h3>Likidite Oranları Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-lq-curr-assets">Dönen Varlıklar (TL)</label>
            <input type="number" id="hc-lq-curr-assets">
        </div>

        <div class="hc-form-group">
            <label for="hc-lq-inventory">Stoklar (TL)</label>
            <input type="number" id="hc-lq-inventory">
        </div>

        <div class="hc-form-group">
            <label for="hc-lq-cash">Nakit ve Benzerleri (TL)</label>
            <input type="number" id="hc-lq-cash">
        </div>

        <div class="hc-form-group">
            <label for="hc-lq-curr-liab">Kısa Vadeli Yükümlülükler (TL)</label>
            <input type="number" id="hc-lq-curr-liab">
        </div>
        
        <button class="hc-btn" onclick="hcLikiditeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-liquidity-result">
            <div class="hc-result-item">
                <span>Cari Oran (Current Ratio):</span>
                <strong id="hc-lq-res-current">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Asit-Test Oranı (Quick Ratio):</span>
                <strong id="hc-lq-res-quick">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Nakit Oranı (Cash Ratio):</span>
                <strong id="hc-lq-res-cash">-</strong>
            </div>
            <p style="text-align:center; font-size: 0.85em; color: #666; margin-top: 10px;">
                Cari Oran > 1.5 idealdir.<br>
                Asit-Test Oranı > 1.0 idealdir.
            </p>
        </div>
    </div>
    <?php
}
