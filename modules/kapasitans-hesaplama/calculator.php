<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kapasitans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kapasitans-hesaplama',
        HC_PLUGIN_URL . 'modules/kapasitans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kapasitans-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kapasitans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kapasitans-hesaplama">
        <h3>Kapasitans Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kap-yalıtkan">Dielektrik (Yalıtkan) Malzeme</label>
            <select id="hc-kap-yalitkan" onchange="hcKapYalitkanDegisti()">
                <option value="1" selected>Vakum / Hava (εr = 1.0)</option>
                <option value="3.7">Kağıt (εr = ~3.7)</option>
                <option value="6">Mika (εr = ~6.0)</option>
                <option value="7">Cam (εr = ~7.0)</option>
                <option value="85">Su (εr = ~85.0)</option>
                <option value="custom">Özel Dielektrik Sabiti (εr)...</option>
            </select>
        </div>
        
        <div class="hc-form-group" id="hc-kap-ozel-kapsayici" style="display:none;">
            <label for="hc-kap-er">Özel Dielektrik Sabiti (εr)</label>
            <input type="number" step="any" id="hc-kap-er" value="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kap-alan">Plaka Alanı (A - cm²)</label>
            <input type="number" step="any" id="hc-kap-alan" value="10" placeholder="Örn: 10" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kap-mesafe">Plakalar Arası Mesafe (d - mm)</label>
            <input type="number" step="any" id="hc-kap-mesafe" value="1" placeholder="Örn: 1" required>
        </div>
        
        <button class="hc-btn" onclick="hcKapasitansHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kapasitans-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
