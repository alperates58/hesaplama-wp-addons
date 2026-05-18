<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fiziksel_sarkac_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fiziksel-sarkac-hesaplama',
        HC_PLUGIN_URL . 'modules/fiziksel-sarkac-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fiziksel-sarkac-hesaplama-css',
        HC_PLUGIN_URL . 'modules/fiziksel-sarkac-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fiziksel-sarkac-hesaplama">
        <h3>Fiziksel Sarkaç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fs-moment">Eylemsizlik Momenti (I - kg·m²)</label>
            <input type="number" step="any" id="hc-fs-moment" placeholder="Örn: 0.5" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-fs-kutle">Kütle (m - kg)</label>
            <input type="number" step="any" id="hc-fs-kutle" placeholder="Örn: 2" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-fs-uzaklik">Kütle Merkezinin Dönme Eksenine Uzaklığı (d - metre)</label>
            <input type="number" step="any" id="hc-fs-uzaklik" placeholder="Örn: 0.3" required>
        </div>
        
        <button class="hc-btn" onclick="hcFizikselSarkacHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-fiziksel-sarkac-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
