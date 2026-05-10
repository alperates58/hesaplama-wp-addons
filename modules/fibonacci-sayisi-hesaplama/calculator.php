<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fibonacci_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fibonacci',
        HC_PLUGIN_URL . 'modules/fibonacci-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fibonacci-css',
        HC_PLUGIN_URL . 'modules/fibonacci-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fibonacci">
        <h3>Fibonacci Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fb-n">Terim Sayısı (n):</label>
            <input type="number" id="hc-fb-n" min="1" max="1000" placeholder="örn: 10">
            <small>Maksimum 1000 terim</small>
        </div>
        <button class="hc-btn" onclick="hcFibonacciHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fibonacci-result">
            <strong>n. Terim Değeri:</strong>
            <div id="hc-fb-res-val" class="hc-result-value">-</div>
            <div style="margin-top:15px;">
                <strong>Dizi (İlk n terim):</strong>
                <p id="hc-fb-res-seq" style="font-size:0.85rem; color:#666; word-wrap: break-word;"></p>
            </div>
        </div>
    </div>
    <?php
}
