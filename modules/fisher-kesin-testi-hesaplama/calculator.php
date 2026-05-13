<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fisher_kesin_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fisher-kesin-testi-hesaplama',
        HC_PLUGIN_URL . 'modules/fisher-kesin-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fisher-kesin-testi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/fisher-kesin-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fisher-test">
        <h3>Fisher Kesin Testi (2x2)</h3>
        <table class="hc-table" style="width: 100%; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th></th>
                    <th>Grup 1</th>
                    <th>Grup 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Durum A</strong></td>
                    <td><input type="number" id="hc-fisher-a" class="hc-input" placeholder="a"></td>
                    <td><input type="number" id="hc-fisher-b" class="hc-input" placeholder="b"></td>
                </tr>
                <tr>
                    <td><strong>Durum B</strong></td>
                    <td><input type="number" id="hc-fisher-c" class="hc-input" placeholder="c"></td>
                    <td><input type="number" id="hc-fisher-d" class="hc-input" placeholder="d"></td>
                </tr>
            </tbody>
        </table>
        <button class="hc-btn" onclick="hcFisherExactHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fisher-kesin-testi-result">
            <div class="hc-result-label">P-Değeri (Tek Kuyruk):</div>
            <div class="hc-result-value" id="hc-res-fisher-p">-</div>
            <p id="hc-fisher-desc" style="margin-top:10px; font-size:0.9em; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
