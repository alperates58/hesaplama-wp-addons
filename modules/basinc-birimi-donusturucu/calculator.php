<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basinc_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-basinc-birimi-donusturucu',
        HC_PLUGIN_URL . 'modules/basinc-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-basinc-birimi-donusturucu-css',
        HC_PLUGIN_URL . 'modules/basinc-birimi-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-basinc-birimi-donusturucu">
        <h3>Basınç Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-bbd-deger">Değer</label>
            <input type="number" id="hc-bbd-deger" placeholder="Değer giriniz" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bbd-kaynak">Kaynak Birim</label>
            <select id="hc-bbd-kaynak">
                <option value="bar">Bar</option>
                <option value="psi">PSI (Pound per Square Inch)</option>
                <option value="pa">Pascal (Pa)</option>
                <option value="kpa">Kilopascal (kPa)</option>
                <option value="mpa">Megapascal (MPa)</option>
                <option value="atm">Atmosfer (atm)</option>
                <option value="mmhg">mmHg (Milimetre Cıva)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBasincDonustur()">Dönüştür</button>
        
        <div class="hc-result" id="hc-basinc-birimi-donusturucu-result">
            <table>
                <thead>
                    <tr>
                        <th>Birim</th>
                        <th>Sonuç</th>
                    </tr>
                </thead>
                <tbody id="hc-bbd-results-body">
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
