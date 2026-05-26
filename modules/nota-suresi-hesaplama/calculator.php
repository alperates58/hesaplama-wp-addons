<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nota_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nota-sure',
        HC_PLUGIN_URL . 'modules/nota-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nota-sure-css',
        HC_PLUGIN_URL . 'modules/nota-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nota-suresi-hesaplama">
        <h3>Nota Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-nsh-bpm">Tempo (BPM)</label>
            <input type="number" id="hc-nsh-bpm" placeholder="Örn: 120" min="20" max="300" value="120">
        </div>
        <button class="hc-btn" onclick="hcNotaSureleriHesapla()">Süreleri Hesapla</button>
        <div class="hc-result" id="hc-nsh-result">
            <h4>Hesaplanan Nota Süreleri (ms):</h4>
            <div style="overflow-x:auto;">
                <table style="font-size:13px;">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nota Tipi</th>
                            <th style="text-align:right;">Düz Süre (ms)</th>
                            <th style="text-align:right;">Noktalı (Dotted - ms)</th>
                            <th style="text-align:right;">Üçleme (Triplet - ms)</th>
                        </tr>
                    </thead>
                    <tbody id="hc-nsh-table-body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}