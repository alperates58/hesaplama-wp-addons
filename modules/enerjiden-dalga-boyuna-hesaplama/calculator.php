<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enerjiden_dalga_boyuna_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-enerjiden-dalga-boyuna-hesaplama',
        HC_PLUGIN_URL . 'modules/enerjiden-dalga-boyuna-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-enerjiden-dalga-boyuna-hesaplama-css',
        HC_PLUGIN_URL . 'modules/enerjiden-dalga-boyuna-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-enerjiden-dalga-boyuna-hesaplama">
        <h3>Enerjiden Dalga Boyuna Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-edb-enerji">Foton Enerjisi</label>
            <input type="number" step="any" id="hc-edb-enerji" placeholder="Değer giriniz" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-edb-birim">Enerji Birimi</label>
            <select id="hc-edb-birim">
                <option value="joule">Joule (J)</option>
                <option value="ev">Elektronvolt (eV)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcEnerjidenDalgaBoyunaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-enerjiden-dalga-boyuna-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
