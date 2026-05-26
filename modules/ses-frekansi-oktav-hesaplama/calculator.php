<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ses_frekansi_oktav_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-audio-octave',
        HC_PLUGIN_URL . 'modules/ses-frekansi-oktav-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-audio-octave-css',
        HC_PLUGIN_URL . 'modules/ses-frekansi-oktav-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ses-frekansi-oktav-hesaplama">
        <h3>Ses Frekansı Oktav Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sfo-referans">Referans Frekans (Hz)</label>
            <input type="number" id="hc-sfo-referans" placeholder="Örn: 440 (Nota A4)" step="any" min="1" value="440">
        </div>
        <button class="hc-btn" onclick="hcOktavHesapla()">Oktav Tablosunu Hesapla</button>
        <div class="hc-result" id="hc-sfo-result">
            <h4>Oktav Frekansları Tablosu:</h4>
            <div style="overflow-x:auto;">
                <table style="font-size:13px;">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Oktav Farkı</th>
                            <th style="text-align:left;">Sınıflandırma</th>
                            <th style="text-align:right;">Frekans (Hz)</th>
                            <th style="text-align:right;">Dalga Boyu (Havada ~cm)</th>
                        </tr>
                    </thead>
                    <tbody id="hc-sfo-table-body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}