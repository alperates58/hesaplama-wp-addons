<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_frekans_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-frekans-donusturme-hesaplama',
        HC_PLUGIN_URL . 'modules/frekans-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-frekans-donusturme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/frekans-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-frekans-donusturme-hesaplama">
        <h3>Frekans Dönüştürme Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fd-deger">Frekans Değeri</label>
            <input type="number" step="any" id="hc-fd-deger" placeholder="Değer giriniz" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-fd-birim">Frekans Birimi</label>
            <select id="hc-fd-birim">
                <option value="hz">Hertz (Hz)</option>
                <option value="khz">Kilohertz (kHz)</option>
                <option value="mhz">Megahertz (MHz)</option>
                <option value="ghz">Gigahertz (GHz)</option>
                <option value="thz">Terahertz (THz)</option>
                <option value="rads">Radyan / Saniye (rad/s)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcFrekansDonusturmeHesapla()">Dönüştür</button>
        
        <div class="hc-result" id="hc-frekans-donusturme-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
