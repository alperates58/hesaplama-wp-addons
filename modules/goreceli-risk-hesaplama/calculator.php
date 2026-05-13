<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_goreceli_risk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-goreceli-risk-hesaplama',
        HC_PLUGIN_URL . 'modules/goreceli-risk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-goreceli-risk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/goreceli-risk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rel-risk">
        <h3>Göreceli Risk (Relative Risk) Hesaplama</h3>
        <table class="hc-table" style="width: 100%; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th>Grup</th>
                    <th>Olay Var</th>
                    <th>Olay Yok</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Maruz Kalan</strong></td>
                    <td><input type="number" id="hc-rr-a" class="hc-input" placeholder="a"></td>
                    <td><input type="number" id="hc-rr-b" class="hc-input" placeholder="b"></td>
                </tr>
                <tr>
                    <td><strong>Maruz Kalmayan</strong></td>
                    <td><input type="number" id="hc-rr-c" class="hc-input" placeholder="c"></td>
                    <td><input type="number" id="hc-rr-d" class="hc-input" placeholder="d"></td>
                </tr>
            </tbody>
        </table>
        <button class="hc-btn" onclick="hcRelativeRiskHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-goreceli-risk-hesaplama-result">
            <div class="hc-result-label">Göreceli Risk (RR):</div>
            <div class="hc-result-value" id="hc-res-rr-val">-</div>
            <p id="hc-rr-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
