<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arac_durma_mesafesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-arac-durma-mesafesi-hesaplama',
        HC_PLUGIN_URL . 'modules/arac-durma-mesafesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-arac-durma-mesafesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/arac-durma-mesafesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-arac-durma-mesafesi-hesaplama">
        <h3>Araç Durma Mesafesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-adm-speed">Araç Hızı (km/h)</label>
            <input type="number" id="hc-adm-speed" placeholder="Örn: 90" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-adm-reaction">Reaksiyon Süresi (s)</label>
            <input type="number" id="hc-adm-reaction" placeholder="Örn: 1" value="1" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-adm-road">Yol Durumu (Sürtünme)</label>
            <select id="hc-adm-road">
                <option value="0.7">Kuru Asfalt (0.7)</option>
                <option value="0.4">Islak Asfalt (0.4)</option>
                <option value="0.1">Buzlu Yol (0.1)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcADMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-adm-result">
            <div class="hc-adm-grid">
                <div class="hc-adm-item">
                    <span class="hc-result-label">Reaksiyon Mesafesi:</span>
                    <span class="hc-result-value" id="hc-adm-react-val">-</span>
                </div>
                <div class="hc-adm-item">
                    <span class="hc-result-label">Fren Mesafesi:</span>
                    <span class="hc-result-value" id="hc-adm-brake-val">-</span>
                </div>
                <div class="hc-adm-item hc-adm-total">
                    <span class="hc-result-label">Toplam Durma Mesafesi:</span>
                    <span class="hc-result-value" id="hc-adm-total-val">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
