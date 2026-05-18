<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_frekans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-frekans-hesaplama',
        HC_PLUGIN_URL . 'modules/frekans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-frekans-hesaplama-css',
        HC_PLUGIN_URL . 'modules/frekans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-frekans-hesaplama">
        <h3>Frekans Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fh-mod">Hesaplama Yöntemi</label>
            <select id="hc-fh-mod" onchange="hcFrekansHesaplamaModDegisti()">
                <option value="periyot">Periyottan (T)</option>
                <option value="dalga">Dalga Hızı ve Dalga Boyundan</option>
            </select>
        </div>
        
        <div id="hc-fh-girdiler">
            <div class="hc-form-group">
                <label for="hc-fh-periyot">Periyot (T - saniye)</label>
                <input type="number" step="any" id="hc-fh-periyot" placeholder="Örn: 0.02" required>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcFrekansHesaplamaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-frekans-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
