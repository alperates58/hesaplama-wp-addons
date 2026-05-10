<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_90_dakikalik_uyku_dongusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-90m-sleep',
        HC_PLUGIN_URL . 'modules/90-dakikalik-uyku-dongusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-90m-sleep-css',
        HC_PLUGIN_URL . 'modules/90-dakikalik-uyku-dongusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-90m-sleep">
        <h3>90 Dakika Kuralı Planlayıcı</h3>
        <p>İdeal bir uyku 5 veya 6 döngüden oluşur.</p>
        <div class="hc-form-group">
            <label for="hc-90m-time">Yatış Saatiniz:</label>
            <input type="time" id="hc-90m-time" value="23:00">
        </div>
        <button class="hc-btn" onclick="hc90mHesapla()">Döngü Tablosunu Gör</button>
        <div class="hc-result" id="hc-90m-sleep-result">
            <table class="hc-table">
                <thead>
                    <tr>
                        <th>Döngü</th>
                        <th>Süre</th>
                        <th>Uyanış Saati</th>
                        <th>Durum</th>
                    </tr>
                </thead>
                <tbody id="hc-90m-res-body"></tbody>
            </table>
        </div>
    </div>
    <?php
}
