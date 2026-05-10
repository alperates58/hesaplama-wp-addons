<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_triatlon_bitirme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tri-avg',
        HC_PLUGIN_URL . 'modules/ortalama-triatlon-bitirme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tri-avg-css',
        HC_PLUGIN_URL . 'modules/ortalama-triatlon-bitirme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tri-avg">
        <h3>Ortalama Triatlon Bitirme Süreleri</h3>
        <div class="hc-form-group">
            <label for="hc-ta-type">Mesafe Seçin:</label>
            <select id="hc-ta-type">
                <option value="sprint">Sprint Mesafesi</option>
                <option value="olympic">Olimpik Mesafesi</option>
                <option value="half">70.3 (Half Ironman)</option>
                <option value="full">140.6 (Full Ironman)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTriAvgHesapla()">Ortalamaları Göster</button>
        <div class="hc-result" id="hc-tri-avg-result">
            <div class="hc-avg-grid">
                <div class="hc-avg-item">
                    <strong>Erkek Ortalama</strong>
                    <div id="hc-ta-male">-</div>
                </div>
                <div class="hc-avg-item">
                    <strong>Kadın Ortalama</strong>
                    <div id="hc-ta-female">-</div>
                </div>
            </div>
            <p style="margin-top:15px; font-size:0.8rem; opacity:0.8;">Veriler binlerce amatör yarışçının ortalamalarına dayanır.</p>
        </div>
    </div>
    <?php
}
