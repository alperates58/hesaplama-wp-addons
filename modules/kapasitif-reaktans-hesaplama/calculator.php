<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kapasitif_reaktans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kapasitif-reaktans-hesaplama',
        HC_PLUGIN_URL . 'modules/kapasitif-reaktans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kapasitif-reaktans-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kapasitif-reaktans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kapasitif-reaktans-hesaplama">
        <h3>Kapasitif Reaktans Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kare-kapasitans">Kapasitans Değeri (C)</label>
            <input type="number" step="any" id="hc-kare-kapasitans" value="10" placeholder="Kapasitans giriniz" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kare-kbirim">Kapasitans Birimi</label>
            <select id="hc-kare-kbirim">
                <option value="uf" selected>mikroFarad (μF)</option>
                <option value="nf">nanoFarad (nF)</option>
                <option value="pf">pikoFarad (pF)</option>
                <option value="f">Farad (F)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kare-frekans">Frekans (f)</label>
            <input type="number" step="any" id="hc-kare-frekans" value="50" placeholder="Frekans giriniz" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kare-fbirim">Frekans Birimi</label>
            <select id="hc-kare-fbirim">
                <option value="hz" selected>Hertz (Hz)</option>
                <option value="khz">kilohertz (kHz)</option>
                <option value="mhz">megahertz (MHz)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcKapasitifReaktansHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kapasitif-reaktans-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
