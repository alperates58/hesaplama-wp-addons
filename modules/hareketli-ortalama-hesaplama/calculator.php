<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hareketli_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hareketli-ortalama-hesaplama',
        HC_PLUGIN_URL . 'modules/hareketli-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hareketli-ortalama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hareketli-ortalama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-moving-avg">
        <h3>Hareketli Ortalama (Moving Average)</h3>
        <div class="hc-form-group">
            <label for="hc-ma-data">Veri Serisi (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-ma-data" class="hc-input" placeholder="Örn: 10, 12, 13, 15, 14, 16, 18, 20"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-ma-window">Pencere Aralığı (Periyot):</label>
            <input type="number" id="hc-ma-window" class="hc-input" value="3" min="2">
        </div>
        <button class="hc-btn" onclick="hcHareketliOrtalamaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hareketli-ortalama-result">
            <div class="hc-result-label">Son Hareketli Ortalama:</div>
            <div class="hc-result-value" id="hc-res-ma-last">-</div>
            <table class="hc-table" style="width: 100%; text-align: center; margin-top: 15px;">
                <thead>
                    <tr>
                        <th>Periyot</th>
                        <th>Değer</th>
                        <th>Hareketli Ortalama</th>
                    </tr>
                </thead>
                <tbody id="hc-ma-tbody"></tbody>
            </table>
        </div>
    </div>
    <?php
}
