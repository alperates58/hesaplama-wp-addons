<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mol_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mol-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/mol-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mol-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mol-sayisi-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mol-sayisi-hesaplama">
        <div class="hc-header">
            <h3>Mol Sayısı Hesaplama</h3>
            <p>Maddenin kütlesini ve mol kütlesini girerek mol sayısını (n) bulun.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-mol-n-mass">Kütle (m - gram)</label>
                <input type="number" id="hc-mol-n-mass" placeholder="Örn: 22" step="0.01">
            </div>

            <div class="hc-form-group">
                <label for="hc-mol-n-ma">Mol Kütlesi (MA - g/mol)</label>
                <input type="number" id="hc-mol-n-ma" placeholder="Örn: 44 (CO2)" step="0.01">
            </div>
        </div>

        <button class="hc-btn" onclick="hcMolSayisiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-mol-n-result">
            <div class="hc-res-label">Mol Sayısı (n)</div>
            <div class="hc-res-main">
                <span id="hc-res-mol-n-val">-</span>
                <small>mol</small>
            </div>
            
            <div class="hc-formula-box">
                n = m / MA
            </div>
        </div>
    </div>
    <?php
}
