<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_induktans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-induktans-hesaplama',
        HC_PLUGIN_URL . 'modules/induktans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-induktans-hesaplama-css',
        HC_PLUGIN_URL . 'modules/induktans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-induktans-hesaplama">
        <h3>İndüktans Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ind-cekirdek">Çekirdek Malzemesi (Relative Permeability)</label>
            <select id="hc-ind-cekirdek" onchange="hcIndCekirdekDegisti()">
                <option value="1" selected>Hava (μr = 1)</option>
                <option value="5000">Demir (μr = ~5000)</option>
                <option value="640">Nikel (μr = ~640)</option>
                <option value="2000">Ferrit / Demir Tozu (μr = ~2000)</option>
                <option value="custom">Özel Geçirgenlik (μr)...</option>
            </select>
        </div>
        
        <div class="hc-form-group" id="hc-ind-ozel-kapsayici" style="display:none;">
            <label for="hc-ind-mur">Özel Bağıl Geçirgenlik (μr)</label>
            <input type="number" step="any" id="hc-ind-mur" value="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ind-sarim">Sarım Sayısı (N)</label>
            <input type="number" step="1" id="hc-ind-sarim" value="100" placeholder="Örn: 100" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ind-uzunluk">Bobin Uzunluğu (l - mm)</label>
            <input type="number" step="any" id="hc-ind-uzunluk" value="50" placeholder="Örn: 50" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ind-cap">Bobin İç Çapı (d - mm)</label>
            <input type="number" step="any" id="hc-ind-cap" value="10" placeholder="Örn: 10" required>
        </div>
        
        <button class="hc-btn" onclick="hcInduktansHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-induktans-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
