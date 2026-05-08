<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metrekare_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-metrekare-donusturucu',
        HC_PLUGIN_URL . 'modules/metrekare-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-metrekare-donusturucu-css',
        HC_PLUGIN_URL . 'modules/metrekare-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-metrekare-donusturucu">
        <h3>Metrekare Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-md-m2">Metrekare (m²)</label>
            <input type="number" id="hc-md-m2" placeholder="m² giriniz" step="any" oninput="hcM2Donustur()">
        </div>
        <div class="hc-result" id="hc-metrekare-donusturucu-result">
            <table>
                <thead>
                    <tr>
                        <th>Birim</th>
                        <th>Sonuç</th>
                    </tr>
                </thead>
                <tbody id="hc-md-results">
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
