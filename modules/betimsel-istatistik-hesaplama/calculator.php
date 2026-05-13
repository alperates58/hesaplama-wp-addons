<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_betimsel_istatistik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-betimsel-istatistik-hesaplama',
        HC_PLUGIN_URL . 'modules/betimsel-istatistik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-betimsel-istatistik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/betimsel-istatistik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-desc-stats">
        <h3>Betimsel İstatistik Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ds-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-ds-data" class="hc-input" placeholder="Örn: 15, 20, 20, 35, 40, 50"></textarea>
        </div>
        <button class="hc-btn" onclick="hcDescStatsHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-betimsel-istatistik-hesaplama-result">
            <table class="hc-table" style="width:100%; text-align: left;">
                <thead>
                    <tr>
                        <th>İstatistik</th>
                        <th>Değer</th>
                    </tr>
                </thead>
                <tbody id="hc-ds-tbody"></tbody>
            </table>
        </div>
    </div>
    <?php
}
