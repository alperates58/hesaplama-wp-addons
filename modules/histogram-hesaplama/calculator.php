<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_histogram_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-histogram-hesaplama',
        HC_PLUGIN_URL . 'modules/histogram-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-histogram-hesaplama-css',
        HC_PLUGIN_URL . 'modules/histogram-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-histogram">
        <h3>Histogram (Frekans) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hist-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-hist-data" class="hc-input" placeholder="Örn: 5, 8, 12, 15, 22, 25, 28, 35"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-hist-bins">Grup (Bin) Sayısı:</label>
            <input type="number" id="hc-hist-bins" class="hc-input" value="5" min="2">
        </div>
        <button class="hc-btn" onclick="hcHistogramHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-histogram-result">
            <div class="hc-result-label">Frekans Dağılım Tablosu:</div>
            <table class="hc-table" style="width: 100%; text-align: center; margin-top: 15px;">
                <thead>
                    <tr>
                        <th>Aralık</th>
                        <th>Frekans (Adet)</th>
                        <th>Yüzde (%)</th>
                    </tr>
                </thead>
                <tbody id="hc-hist-tbody"></tbody>
            </table>
        </div>
    </div>
    <?php
}
