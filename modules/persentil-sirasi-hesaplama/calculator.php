<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_persentil_sirasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-persentil-sirasi-hesaplama',
        HC_PLUGIN_URL . 'modules/persentil-sirasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-persentil-sirasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/persentil-sirasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-persentil-sirasi-hesaplama">
        <h3>Persentil Sırası Hesaplama</h3>
        <p>Verileri virgül veya boşluk ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-pr-data">Veri Seti</label>
            <textarea id="hc-pr-data" rows="4" placeholder="60, 70, 80, 85, 90, 95, 100"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-pr-value">Sırası Bulunacak Değer (X)</label>
            <input type="number" id="hc-pr-value" step="any" placeholder="Örn: 85">
        </div>
        <button class="hc-btn" onclick="hcPersentilSirasiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-persentil-sirasi-hesaplama-result">
            <span class="hc-label">Persentil Sırası (PR):</span>
            <div class="hc-result-value" id="hc-pr-res-value">0</div>
            <div id="hc-pr-res-desc" style="margin-top:10px;"></div>
        </div>
    </div>
    <?php
}
