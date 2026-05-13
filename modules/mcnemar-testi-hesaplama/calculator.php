<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mcnemar_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mcnemar-testi-hesaplama',
        HC_PLUGIN_URL . 'modules/mcnemar-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mcnemar-testi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mcnemar-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mcnemar-testi-hesaplama">
        <h3>McNemar Testi Hesaplama</h3>
        <table class="hc-mcnemar-table">
            <tr>
                <th></th>
                <th>Sonra: Olumlu</th>
                <th>Sonra: Olumsuz</th>
            </tr>
            <tr>
                <th>Önce: Olumlu</th>
                <td><input type="number" id="hc-mc-a" value="0"> (a)</td>
                <td><input type="number" id="hc-mc-b" value="0"> (b)</td>
            </tr>
            <tr>
                <th>Önce: Olumsuz</th>
                <td><input type="number" id="hc-mc-c" value="0"> (c)</td>
                <td><input type="number" id="hc-mc-d" value="0"> (d)</td>
            </tr>
        </table>
        <button class="hc-btn" onclick="hcMcNemarHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mcnemar-testi-hesaplama-result">
            <div id="hc-mc-res-chi">Chi-Kare: -</div>
            <div id="hc-mc-res-p">P-Değeri: -</div>
            <div id="hc-mc-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
