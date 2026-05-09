<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_molalite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-molalite-hesaplama',
        HC_PLUGIN_URL . 'modules/molalite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-molalite-hesaplama-css',
        HC_PLUGIN_URL . 'modules/molalite-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-molalite-hesaplama">
        <div class="hc-header">
            <h3>Molalite Hesaplama</h3>
            <p>Çözünen mol sayısını ve çözücü kütlesini girerek molalite (m) değerini hesaplayın.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-solute-mols">Çözünen Madde Molü (mol)</label>
                <input type="number" id="hc-solute-mols" placeholder="Örn: 0.5" step="0.01">
            </div>

            <div class="hc-form-group">
                <label for="hc-solvent-mass">Çözücü Kütlesi (gram)</label>
                <input type="number" id="hc-solvent-mass" placeholder="Örn: 1000" step="1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcMolaliteHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-molalite-result">
            <div class="hc-res-label">Molalite (m)</div>
            <div class="hc-res-main">
                <span id="hc-res-molalite-val">-</span>
                <small>mol / kg</small>
            </div>
            
            <div class="hc-formula-box">
                m = n<sub>çözünen</sub> / m<sub>çözücü (kg)</sub>
            </div>
        </div>
    </div>
    <?php
}
