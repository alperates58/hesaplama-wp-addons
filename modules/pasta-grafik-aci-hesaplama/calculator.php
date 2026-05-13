<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pasta_grafik_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pasta-grafik-aci-hesaplama',
        HC_PLUGIN_URL . 'modules/pasta-grafik-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pasta-grafik-aci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/pasta-grafik-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pasta-grafik-aci-hesaplama">
        <h3>Pasta Grafik Açı Hesaplama</h3>
        <p>Değerleri virgül veya boşluk ile giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-pga-data">Değerler</label>
            <textarea id="hc-pga-data" rows="4" placeholder="40, 25, 15, 20"></textarea>
        </div>
        <button class="hc-btn" onclick="hcPastaAciHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pasta-grafik-aci-hesaplama-result">
            <table class="hc-result-table">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Değer</th>
                        <th>Yüzde</th>
                        <th>Açı (Derece)</th>
                    </tr>
                </thead>
                <tbody id="hc-pga-res-body"></tbody>
                <tfoot>
                    <tr style="font-weight:bold; background:#eee;">
                        <td colspan="2">TOPLAM</td>
                        <td>%100</td>
                        <td>360°</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?php
}
