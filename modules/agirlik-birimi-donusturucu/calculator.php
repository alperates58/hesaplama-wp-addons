<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agirlik_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-agirlik-birimi-donusturucu',
        HC_PLUGIN_URL . 'modules/agirlik-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-agirlik-birimi-donusturucu-css',
        HC_PLUGIN_URL . 'modules/agirlik-birimi-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-agirlik-birimi-donusturucu">
        <h3>Ağırlık Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-abd-deger">Değer</label>
            <input type="number" id="hc-abd-deger" placeholder="Dönüştürmek istediğiniz değeri girin" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-abd-kaynak">Kaynak Birim</label>
            <select id="hc-abd-kaynak">
                <option value="kg">Kilogram (kg)</option>
                <option value="g">Gram (g)</option>
                <option value="mg">Miligram (mg)</option>
                <option value="ton">Ton (t)</option>
                <option value="lb">Pound (lb)</option>
                <option value="oz">Ons (oz)</option>
                <option value="st">Stone (st)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAgirlikDonustur()">Dönüştür</button>
        
        <div class="hc-result" id="hc-agirlik-birimi-donusturucu-result">
            <table>
                <thead>
                    <tr>
                        <th>Birim</th>
                        <th>Sonuç</th>
                    </tr>
                </thead>
                <tbody id="hc-abd-results-body">
                    <!-- JS ile doldurulacak -->
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
