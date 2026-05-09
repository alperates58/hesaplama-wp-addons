<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enzim_aktivitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-enzim-aktivitesi-hesaplama',
        HC_PLUGIN_URL . 'modules/enzim-aktivitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-enzim-aktivitesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/enzim-aktivitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-enzim-aktivitesi-hesaplama">
        <h3>Enzim Aktivitesi Hesaplama (U/mL)</h3>
        <div class="hc-form-group">
            <label for="hc-enz-delta">Absorbans Değişimi (ΔAbs/dk)</label>
            <input type="number" id="hc-enz-delta" placeholder="Örn: 0.05" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-enz-eps">Söndürme Katsayısı (ε, M⁻¹ cm⁻¹)</label>
            <input type="number" id="hc-enz-eps" placeholder="Örn: 6220 (NADH için)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-enz-vt">Toplam Reaksiyon Hacmi (µL)</label>
            <input type="number" id="hc-enz-vt" placeholder="Örn: 1000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-enz-vs">Örnek Hacmi (µL)</label>
            <input type="number" id="hc-enz-vs" placeholder="Örn: 50" step="any">
        </div>
        <button class="hc-btn" onclick="hcEnzimAktivitesiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-enz-result">
            <div class="hc-result-label">Enzim Aktivitesi:</div>
            <div class="hc-result-value" id="hc-enz-val">-</div>
            <div class="hc-result-note">
                1 Ünite (U): Dakikada 1 µmol substrat dönüştüren enzim miktarıdır.
            </div>
        </div>
    </div>
    <?php
}
