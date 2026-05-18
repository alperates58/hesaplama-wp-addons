<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_frekans_dalga_boyu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-frekans-dalga-boyu-hesaplama',
        HC_PLUGIN_URL . 'modules/frekans-dalga-boyu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-frekans-dalga-boyu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/frekans-dalga-boyu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-frekans-dalga-boyu-hesaplama">
        <h3>Frekans Dalga Boyu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fdb-hiz">Dalga Yayılma Hızı (v - m/s)</label>
            <input type="number" step="any" id="hc-fdb-hiz" placeholder="Ses hızı: 343, Işık hızı: 299792458" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-fdb-hedef">Hesaplanacak Değer</label>
            <select id="hc-fdb-hedef" onchange="hcFrekansDalgaBoyuHedefDegisti()">
                <option value="dalga">Dalga Boyu (λ) Hesapla</option>
                <option value="frekans">Frekans (f) Hesapla</option>
            </select>
        </div>
        
        <div class="hc-form-group" id="hc-fdb-girdi-grup">
            <label id="hc-fdb-girdi-label" for="hc-fdb-girdi">Frekans (f - Hz)</label>
            <input type="number" step="any" id="hc-fdb-girdi" placeholder="Örn: 1000" required>
        </div>
        
        <button class="hc-btn" onclick="hcFrekansDalgaBoyuHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-frekans-dalga-boyu-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
