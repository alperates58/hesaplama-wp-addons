<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_frekanstan_dalga_boyuna_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-frekanstan-dalga-boyuna-hesaplama',
        HC_PLUGIN_URL . 'modules/frekanstan-dalga-boyuna-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-frekanstan-dalga-boyuna-hesaplama-css',
        HC_PLUGIN_URL . 'modules/frekanstan-dalga-boyuna-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-frekanstan-dalga-boyuna-hesaplama">
        <h3>Frekanstan Dalga Boyuna Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fdb2-frekans">Frekans Değeri</label>
            <input type="number" step="any" id="hc-fdb2-frekans" placeholder="Frekans giriniz" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-fdb2-birim">Frekans Birimi</label>
            <select id="hc-fdb2-birim">
                <option value="hz">Hertz (Hz)</option>
                <option value="khz">Kilohertz (kHz)</option>
                <option value="mhz">Megahertz (MHz)</option>
                <option value="ghz">Gigahertz (GHz)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-fdb2-hiz">Ortam Dalga Hızı (v - m/s)</label>
            <input type="number" step="any" id="hc-fdb2-hiz" value="299792458" placeholder="Işık hızı varsayılandır" required>
        </div>
        
        <button class="hc-btn" onclick="hcFrekanstanDalgaBoyunaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-frekanstan-dalga-boyuna-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
