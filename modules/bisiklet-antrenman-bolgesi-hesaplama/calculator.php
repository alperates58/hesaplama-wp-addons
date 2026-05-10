<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_antrenman_bolgesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bisiklet-antrenman-bolgesi-hesaplama',
        HC_PLUGIN_URL . 'modules/bisiklet-antrenman-bolgesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bisiklet-antrenman-bolgesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bisiklet-antrenman-bolgesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bike-zones">
        <h3>Bisiklet Güç Bölgeleri (Coggan)</h3>
        <div class="hc-form-group">
            <label for="hc-ftp">FTP Değeriniz (Watt)</label>
            <input type="number" id="hc-ftp" placeholder="Örn: 250">
            <small>FTP: 1 saat boyunca sürdürebileceğiniz maksimum güçtür.</small>
        </div>
        <button class="hc-btn" onclick="hcBisikletAntrenmanBolgesiHesapla()">Bölgeleri Hesapla</button>
        <div class="hc-result" id="hc-zones-result">
            <table>
                <thead>
                    <tr>
                        <th>Bölge</th>
                        <th>Tanım</th>
                        <th>Watt Aralığı</th>
                    </tr>
                </thead>
                <tbody id="hc-zones-table"></tbody>
            </table>
        </div>
    </div>
    <?php
}
