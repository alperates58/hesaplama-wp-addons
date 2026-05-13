<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pasta_grafik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pasta-grafik-hesaplama',
        HC_PLUGIN_URL . 'modules/pasta-grafik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pasta-grafik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/pasta-grafik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pasta-grafik-hesaplama">
        <h3>Pasta Grafik Hesaplama</h3>
        <p>Verilerinizi giriniz (Örn: Elma 50, Armut 30, Muz 20).</p>
        <div class="hc-form-group">
            <label for="hc-pg-data">Veriler</label>
            <textarea id="hc-pg-data" rows="6" placeholder="Kategori A: 45&#10;Kategori B: 30&#10;Kategori C: 25"></textarea>
        </div>
        <button class="hc-btn" onclick="hcPastaGrafikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pasta-grafik-hesaplama-result">
            <div id="hc-pg-visual-summary" class="hc-pg-visual"></div>
            <table class="hc-result-table">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Yüzde</th>
                        <th>Açı (Derece)</th>
                    </tr>
                </thead>
                <tbody id="hc-pg-res-body"></tbody>
            </table>
        </div>
    </div>
    <?php
}
