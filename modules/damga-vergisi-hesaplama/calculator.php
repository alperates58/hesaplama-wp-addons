<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_damga_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-damga-vergi',
        HC_PLUGIN_URL . 'modules/damga-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-damga-vergi-css',
        HC_PLUGIN_URL . 'modules/damga-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-damga-vergisi-hesaplama">
        <h3>Damga Vergisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-dv-amount">Tutar (TL)</label>
            <input type="number" id="hc-dv-amount" placeholder="Matrah">
        </div>

        <div class="hc-form-group">
            <label for="hc-dv-type">Belge Türü</label>
            <select id="hc-dv-type">
                <option value="0.00948">Sözleşmeler (%0.948)</option>
                <option value="0.00759">Maaş / Ücret Ödemeleri (%0.759)</option>
                <option value="0.00189">Kira Sözleşmeleri (%0.189)</option>
                <option value="0.00569">İhale Kararları (%0.569)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcDamgaVergisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-damga-result">
            <div class="hc-result-item">
                <span>Uygulanan Oran:</span>
                <strong id="hc-dv-res-rate">-</strong>
            </div>
            <div class="hc-result-value" id="hc-dv-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Hesaplanan Damga Vergisi</p>
        </div>
    </div>
    <?php
}
