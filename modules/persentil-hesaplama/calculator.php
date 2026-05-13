<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_persentil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-persentil-hesaplama',
        HC_PLUGIN_URL . 'modules/persentil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-persentil-hesaplama-css',
        HC_PLUGIN_URL . 'modules/persentil-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-persentil-hesaplama">
        <h3>Persentil Hesaplama</h3>
        <p>Verileri virgül veya boşluk ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-p-data">Veri Seti</label>
            <textarea id="hc-p-data" rows="4" placeholder="10, 20, 30, 40, 50, 60, 70, 80, 90, 100"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-p-percent">İstenen Persentil (P)</label>
            <input type="number" id="hc-p-percent" step="any" min="0" max="100" placeholder="Örn: 75">
        </div>
        <button class="hc-btn" onclick="hcPersentilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-persentil-hesaplama-result">
            <span class="hc-label" id="hc-p-res-label">Değer:</span>
            <div class="hc-result-value" id="hc-p-res-value">0</div>
            <div id="hc-p-res-desc" style="margin-top:10px; font-style:italic; color:#666;"></div>
        </div>
    </div>
    <?php
}
