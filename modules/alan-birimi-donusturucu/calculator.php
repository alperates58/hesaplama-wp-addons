<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alan_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-alan-birimi-donusturucu',
        HC_PLUGIN_URL . 'modules/alan-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alan-birimi-donusturucu-css',
        HC_PLUGIN_URL . 'modules/alan-birimi-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alan-birimi-donusturucu">
        <h3>Alan Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-abd-alan-deger">Değer</label>
            <input type="number" id="hc-abd-alan-deger" placeholder="Değer giriniz" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-abd-alan-kaynak">Kaynak Birim</label>
            <select id="hc-abd-alan-kaynak">
                <option value="m2">Metrekare (m²)</option>
                <option value="cm2">Santimetrekare (cm²)</option>
                <option value="mm2">Milimetrekare (mm²)</option>
                <option value="km2">Kilometrekare (km²)</option>
                <option value="dekar">Dekar / Dönüm</option>
                <option value="hektar">Hektar (ha)</option>
                <option value="acre">Acre (ac)</option>
                <option value="sqft">Fit Kare (sq ft)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAlanDonustur()">Dönüştür</button>
        
        <div class="hc-result" id="hc-alan-birimi-donusturucu-result">
            <table>
                <thead>
                    <tr>
                        <th>Birim</th>
                        <th>Sonuç</th>
                    </tr>
                </thead>
                <tbody id="hc-abd-alan-results-body">
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
