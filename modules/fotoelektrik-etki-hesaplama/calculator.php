<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fotoelektrik_etki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fotoelektrik-etki-hesaplama',
        HC_PLUGIN_URL . 'modules/fotoelektrik-etki-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fotoelektrik-etki-hesaplama-css',
        HC_PLUGIN_URL . 'modules/fotoelektrik-etki-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fotoelektrik-etki-hesaplama">
        <h3>Fotoelektrik Etki Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fee-dalga">Gelen Işığın Dalga Boyu (nm)</label>
            <input type="number" step="any" id="hc-fee-dalga" placeholder="Örn: 400" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-fee-esik">Metal Eşik Enerjisi (Bağlanma Enerjisi - eV)</label>
            <input type="number" step="any" id="hc-fee-esik" placeholder="Örn: 2.3" required>
        </div>
        
        <button class="hc-btn" onclick="hcFotoelektrikEtkiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-fotoelektrik-etki-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
