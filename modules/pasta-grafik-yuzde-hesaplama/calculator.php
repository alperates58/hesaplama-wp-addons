<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pasta_grafik_yuzde_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pasta-grafik-yuzde-hesaplama',
        HC_PLUGIN_URL . 'modules/pasta-grafik-yuzde-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pasta-grafik-yuzde-hesaplama-css',
        HC_PLUGIN_URL . 'modules/pasta-grafik-yuzde-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pasta-grafik-yuzde-hesaplama">
        <h3>Pasta Grafik Yüzde Hesaplama</h3>
        <p>Her satıra "Etiket: Değer" veya sadece "Değer" giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-pie-data">Veriler</label>
            <textarea id="hc-pie-data" rows="6" placeholder="Kira: 5000&#10;Mutfak: 3000&#10;Faturalar: 1200"></textarea>
        </div>
        <button class="hc-btn" onclick="hcPastaYuzdeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pasta-grafik-yuzde-hesaplama-result">
            <table class="hc-result-table">
                <thead>
                    <tr>
                        <th>Etiket</th>
                        <th>Değer</th>
                        <th>Yüzde (%)</th>
                    </tr>
                </thead>
                <tbody id="hc-pie-res-body"></tbody>
                <tfoot>
                    <tr style="font-weight:bold;">
                        <td>TOPLAM</td>
                        <td id="hc-pie-total-val">-</td>
                        <td id="hc-pie-total-pct">%100</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?php
}
