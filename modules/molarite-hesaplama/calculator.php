<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_molarite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-molarite-hesaplama',
        HC_PLUGIN_URL . 'modules/molarite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-molarite-hesaplama-css',
        HC_PLUGIN_URL . 'modules/molarite-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-molarite-hesaplama">
        <div class="hc-header">
            <h3>Molarite Hesaplama</h3>
            <p>Çözünen mol sayısını ve toplam hacmi girerek molarite (M) değerini bulun.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-molar-n">Çözünen Mol Sayısı (mol)</label>
                <input type="number" id="hc-molar-n" placeholder="Örn: 0.1" step="0.001">
            </div>

            <div class="hc-form-group">
                <label for="hc-molar-v">Çözelti Hacmi (mL)</label>
                <input type="number" id="hc-molar-v" placeholder="Örn: 250" step="1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcMolariteHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-molarity-result">
            <div class="hc-res-label">Molarite (M)</div>
            <div class="hc-res-main">
                <span id="hc-res-molar-val">-</span>
                <small>mol / L</small>
            </div>
            
            <div class="hc-formula-box">
                M = n<sub>çözünen</sub> / V<sub>çözelti (L)</sub>
            </div>
        </div>
    </div>
    <?php
}
