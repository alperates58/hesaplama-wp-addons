<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_jupiter_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-jupiter-burcu',
        HC_PLUGIN_URL . 'modules/jupiter-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-jupiter-burcu-css',
        HC_PLUGIN_URL . 'modules/jupiter-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-jupiter-burcu-hesaplama">
        <div class="hc-header">
            <h3>Jüpiter Burcu, Şans ve Bolluk Hesaplama</h3>
            <p class="hc-subtitle">Doğum anınızdaki Jüpiter konumunu, hayatınızdaki en büyük şans ve büyüme alanlarını, bolluk kapılarınızı keşfedin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-jupiter-tarih">Doğum Tarihi *</label>
            <input type="date" id="hc-jupiter-tarih" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcJupiterBurcuHesapla()">♃ Jüpiter Burcumu Hesapla</button>

        <div class="hc-result" id="hc-jupiter-burcu-result">
            <div class="hc-jupiter-summary-card">
                <div class="hc-jupiter-badge-row">
                    <span class="hc-jupiter-badge-deg" id="hc-jupiter-deg-badge">-</span>
                    <span class="hc-jupiter-badge-motion" id="hc-jupiter-motion-badge">-</span>
                </div>
                <div class="hc-jupiter-result-title" id="hc-jupiter-value">-</div>
                <div class="hc-jupiter-result-subtitle" id="hc-jupiter-meta">-</div>
            </div>

            <div class="hc-jupiter-report-card">
                <h4 class="hc-jupiter-report-title">🍀 Şans Kapıları, Bolluk ve Ruhsal Bilgelik</h4>
                <div id="hc-jupiter-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
