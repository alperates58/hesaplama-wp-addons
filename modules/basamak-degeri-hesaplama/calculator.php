<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basamak_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-place-value',
        HC_PLUGIN_URL . 'modules/basamak-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-place-value-css',
        HC_PLUGIN_URL . 'modules/basamak-degeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-place-value">
        <h3>Basamak Değeri Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pv-val">Sayı</label>
            <input type="number" id="hc-pv-val" placeholder="Örn: 12345" step="1">
        </div>

        <button class="hc-btn" onclick="hcBasamakDegeriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pv-result">
            <table class="hc-pv-table">
                <thead>
                    <tr>
                        <th>Rakam</th>
                        <th>Basamak Adı</th>
                        <th>Basamak Değeri</th>
                    </tr>
                </thead>
                <tbody id="hc-res-pv-body">
                    <!-- Results here -->
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
