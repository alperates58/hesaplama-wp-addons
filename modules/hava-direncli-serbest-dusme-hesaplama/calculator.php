<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hava_direncli_serbest_dusme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hava-direncli-serbest-dusme-hesaplama',
        HC_PLUGIN_URL . 'modules/hava-direncli-serbest-dusme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hava-direncli-serbest-dusme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hava-direncli-serbest-dusme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hava-direncli-serbest-dusme-hesaplama">
        <h3>Hava Dirençli Serbest Düşme Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hdsd-kutle">Kütle (m - kg)</label>
            <input type="number" step="any" id="hc-hdsd-kutle" value="80" placeholder="Örn: 80" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hdsd-alan">Kesit Alanı (A - m²)</label>
            <input type="number" step="any" id="hc-hdsd-alan" value="0.7" placeholder="İnsan için enine alan: ~0.7" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hdsd-cd">Sürüklenme Katsayısı (Cd)</label>
            <input type="number" step="any" id="hc-hdsd-cd" value="1.0" placeholder="Küre: 0.47, İnsan: 1.0 - 1.2" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hdsd-yogunluk">Hava Yoğunluğu (ρ - kg/m³)</label>
            <input type="number" step="any" id="hc-hdsd-yogunluk" value="1.204" placeholder="Deniz seviyesi standart: 1.204" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hdsd-sure">Düşüş Süresi (t - saniye)</label>
            <input type="number" step="any" id="hc-hdsd-sure" value="5" placeholder="Örn: 5" required>
        </div>
        
        <button class="hc-btn" onclick="hcHavaDirencliSerbestDusmeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hava-direncli-serbest-dusme-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
