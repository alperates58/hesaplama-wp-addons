<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_normalite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-normalite-hesaplama',
        HC_PLUGIN_URL . 'modules/normalite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-normalite-hesaplama-css',
        HC_PLUGIN_URL . 'modules/normalite-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-normalite-hesaplama">
        <div class="hc-header">
            <h3>Normalite Hesaplama</h3>
            <p>Çözeltinin normalitesini kütle, mol kütlesi ve tesir değerliğine göre hesaplayın.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-norm-mass">Madde Kütlesi (g)</label>
                <input type="number" id="hc-norm-mass" placeholder="Örn: 49" step="0.01">
            </div>

            <div class="hc-form-group">
                <label for="hc-norm-molar">Mol Kütlesi (g/mol)</label>
                <input type="number" id="hc-norm-molar" placeholder="Örn: 98 (H2SO4)" step="0.01">
            </div>

            <div class="hc-form-group">
                <label for="hc-norm-z">Tesir Değerliği (z)</label>
                <input type="number" id="hc-norm-z" placeholder="Örn: 2" step="1">
            </div>

            <div class="hc-form-group">
                <label for="hc-norm-vol">Çözelti Hacmi (L)</label>
                <input type="number" id="hc-norm-vol" placeholder="Örn: 1" step="0.001">
            </div>
        </div>

        <button class="hc-btn" onclick="hcNormaliteHesapla()">Normaliteyi Hesapla</button>

        <div class="hc-result" id="hc-norm-result">
            <div class="hc-result-label">Normalite (N)</div>
            <div class="hc-result-main">
                <span id="hc-res-normality">-</span>
                <small>N (eşdeğer/L)</small>
            </div>
            
            <div class="hc-formula-box">
                N = M × z = (m / (MA / z)) / V
            </div>
        </div>
    </div>
    <?php
}
