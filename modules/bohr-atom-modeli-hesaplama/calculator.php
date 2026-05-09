<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bohr_atom_modeli_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bohr-atom-modeli-hesaplama',
        HC_PLUGIN_URL . 'modules/bohr-atom-modeli-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bohr-atom-modeli-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bohr-atom-modeli-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bohr-atom-modeli-hesaplama">
        <h3>Bohr Atom Modeli Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bam-n">Yörünge Numarası (n)</label>
            <input type="number" id="hc-bam-n" placeholder="Örn: 1" value="1" min="1" step="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-bam-z">Atom Numarası (Z - Hidrojen için 1)</label>
            <input type="number" id="hc-bam-z" placeholder="Örn: 1" value="1" min="1" step="1">
        </div>
        <button class="hc-btn" onclick="hcBAMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bam-result">
            <div class="hc-bam-grid">
                <div class="hc-bam-item">
                    <span class="hc-result-label">Yörünge Yarıçapı (r_n):</span>
                    <span class="hc-result-value" id="hc-bam-radius">-</span>
                </div>
                <div class="hc-bam-item">
                    <span class="hc-result-label">Enerji Seviyesi (E_n):</span>
                    <span class="hc-result-value" id="hc-bam-energy">-</span>
                </div>
            </div>
            <div class="hc-result-note">r_n = 0.529 * n²/Z Å | E_n = -13.6 * Z²/n² eV</div>
        </div>
    </div>
    <?php
}
