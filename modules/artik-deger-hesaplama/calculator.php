<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_artik_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-artik-deger-hesaplama',
        HC_PLUGIN_URL . 'modules/artik-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-artik-deger-hesaplama-css',
        HC_PLUGIN_URL . 'modules/artik-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-residual-calc">
        <h3>Artık Değer (Residual) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-res-actual">Gerçek Değerler (y):</label>
            <textarea id="hc-res-actual" class="hc-input" placeholder="Örn: 10, 15, 20"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-res-pred">Tahmin Edilen Değerler (ŷ):</label>
            <textarea id="hc-res-pred" class="hc-input" placeholder="Örn: 9.5, 15.2, 19.8"></textarea>
        </div>
        <button class="hc-btn" onclick="hcResidualHesapla()">Artıkları Hesapla</button>
        <div class="hc-result" id="hc-artik-deger-hesaplama-result">
            <table class="hc-table" style="width:100%; text-align: left;">
                <thead>
                    <tr>
                        <th>Gözlem</th>
                        <th>Gerçek (y)</th>
                        <th>Tahmin (ŷ)</th>
                        <th>Artık (y-ŷ)</th>
                    </tr>
                </thead>
                <tbody id="hc-res-tbody"></tbody>
            </table>
            <div style="margin-top:15px; font-weight:bold;">Artıkların Toplamı: <span id="hc-res-sum">0</span></div>
        </div>
    </div>
    <?php
}
