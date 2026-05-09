<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ortalama-hesaplama',
        HC_PLUGIN_URL . 'modules/ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ortalama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ortalama-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ortalama-hesaplama">
        <div class="hc-header">
            <h3>Ortalama Hesaplama</h3>
            <p>Sayıları virgül veya boşlukla ayırarak girin.</p>
        </div>
        
        <div class="hc-form-group">
            <label>Veri Seti</label>
            <textarea id="hc-avg-input" placeholder="5, 10, 15, 20" rows="3"></textarea>
        </div>

        <button class="hc-btn" onclick="hcOrtalamaHesapla()">Ortalamaları Hesapla</button>

        <div class="hc-result" id="hc-avg-result">
            <div class="hc-avg-grid">
                <div class="hc-avg-card">
                    <div class="hc-avg-label">Aritmetik</div>
                    <div id="hc-res-arithmetic">-</div>
                </div>
                <div class="hc-avg-card">
                    <div class="hc-avg-label">Geometrik</div>
                    <div id="hc-res-geometric">-</div>
                </div>
                <div class="hc-avg-card">
                    <div class="hc-avg-label">Harmonik</div>
                    <div id="hc-res-harmonic">-</div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
