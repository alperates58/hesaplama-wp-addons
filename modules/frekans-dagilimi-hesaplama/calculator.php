<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_frekans_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-frekans-dagilimi-hesaplama',
        HC_PLUGIN_URL . 'modules/frekans-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-frekans-dagilimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/frekans-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-freq-dist">
        <h3>Frekans Dağılımı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fd-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-fd-data" class="hc-input" placeholder="Örn: 5, 2, 5, 3, 2, 5, 1, 4"></textarea>
        </div>
        <button class="hc-btn" onclick="hcFrekansDagilimiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-frekans-dagilimi-result">
            <div class="hc-result-label">Değer Frekans Tablosu:</div>
            <table class="hc-table" style="width: 100%; text-align: center; margin-top: 15px;">
                <thead>
                    <tr>
                        <th>Değer (X)</th>
                        <th>Frekans (f)</th>
                        <th>Göreceli Frekans</th>
                        <th>Yüzde (%)</th>
                    </tr>
                </thead>
                <tbody id="hc-fd-tbody"></tbody>
            </table>
        </div>
    </div>
    <?php
}
