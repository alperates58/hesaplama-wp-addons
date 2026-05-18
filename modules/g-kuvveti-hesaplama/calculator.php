<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_g_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-g-kuvveti-hesaplama',
        HC_PLUGIN_URL . 'modules/g-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-g-kuvveti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/g-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-g-kuvveti-hesaplama">
        <h3>G Kuvveti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gk-tip">İvme Tipi</label>
            <select id="hc-gk-tip" onchange="hcGKuvvetiTipDegisti()">
                <option value="lineer">Lineer İvmeden</option>
                <option value="dairesel">Dairesel (Merkezcil) İvmeden</option>
            </select>
        </div>
        
        <div id="hc-gk-girdiler">
            <div class="hc-form-group">
                <label for="hc-gk-ivme">Lineer İvme (a - m/s²)</label>
                <input type="number" step="any" id="hc-gk-ivme" placeholder="Örn: 25" required>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcGKuvvetiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-g-kuvveti-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
