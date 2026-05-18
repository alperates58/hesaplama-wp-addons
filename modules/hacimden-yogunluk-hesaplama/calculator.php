<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hacimden_yogunluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hacimden-yogunluk-hesaplama',
        HC_PLUGIN_URL . 'modules/hacimden-yogunluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hacimden-yogunluk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hacimden-yogunluk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hacimden-yogunluk-hesaplama">
        <h3>Hacimden Yoğunluk Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hy-kutle">Kütle Değeri (m)</label>
            <input type="number" step="any" id="hc-hy-kutle" placeholder="Değer giriniz" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hy-kbirim">Kütle Birimi</label>
            <select id="hc-hy-kbirim">
                <option value="kg">Kilogram (kg)</option>
                <option value="ton">Ton (t)</option>
                <option value="gram">Gram (g)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hy-hacim">Hacim Değeri (V)</label>
            <input type="number" step="any" id="hc-hy-hacim" placeholder="Değer giriniz" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hy-hbirim">Hacim Birimi</label>
            <select id="hc-hy-hbirim">
                <option value="m3">Metreküp (m³)</option>
                <option value="litre">Litre (L / dm³)</option>
                <option value="cm3">Santimetreküp (cm³)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcHacimdenYogunlukHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hacimden-yogunluk-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
