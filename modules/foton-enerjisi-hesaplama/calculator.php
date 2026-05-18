<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_foton_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-foton-enerjisi-hesaplama',
        HC_PLUGIN_URL . 'modules/foton-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-foton-enerjisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/foton-enerjisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-foton-enerjisi-hesaplama">
        <h3>Foton Enerjisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fe-tip">Girdi Türü</label>
            <select id="hc-fe-tip" onchange="hcFotonEnerjisiTipDegisti()">
                <option value="dalga">Dalga Boyu (nm)</option>
                <option value="frekans">Frekans (THz)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label id="hc-fe-etiket" for="hc-fe-deger">Dalga Boyu (nm)</label>
            <input type="number" step="any" id="hc-fe-deger" placeholder="Örn: 500" required>
        </div>
        
        <button class="hc-btn" onclick="hcFotonEnerjisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-foton-enerjisi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
