<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bench_press_piramit_set_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bench-press-piramit-set-hesaplama',
        HC_PLUGIN_URL . 'modules/bench-press-piramit-set-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bench-press-piramit-set-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bench-press-piramit-set-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bench-pyramid">
        <h3>Bench Press Piramit Set Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pyramid-1rm">1RM Değeriniz (kg)</label>
            <input type="number" id="hc-pyramid-1rm" placeholder="Örn: 120" step="0.5">
            <small>Bilmiyorsanız Bench Press 1RM aracını kullanın.</small>
        </div>
        <button class="hc-btn" onclick="hcBenchPressPiramitSetHesapla()">Programı Oluştur</button>
        <div class="hc-result" id="hc-pyramid-result">
            <table>
                <thead>
                    <tr>
                        <th>Set</th>
                        <th>Tekrar</th>
                        <th>Ağırlık (kg)</th>
                        <th>Yoğunluk</th>
                    </tr>
                </thead>
                <tbody id="hc-pyramid-table"></tbody>
            </table>
        </div>
    </div>
    <?php
}
