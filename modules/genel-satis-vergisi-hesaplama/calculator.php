<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_genel_satis_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-genel-satis-vergi',
        HC_PLUGIN_URL . 'modules/genel-satis-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-genel-satis-vergi-css',
        HC_PLUGIN_URL . 'modules/genel-satis-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-genel-sv">
        <h3>Genel Satış Vergisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gsv-amount">İşlem Tutarı (₺)</label>
            <input type="number" id="hc-gsv-amount" placeholder="Örn: 25.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-gsv-rate">Vergi Oranı (%)</label>
            <input type="number" id="hc-gsv-rate" value="20" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-gsv-mode">Tutar İçeriği</label>
            <select id="hc-gsv-mode">
                <option value="hariç">Vergi Hariç (Matrah)</option>
                <option value="dahil">Vergi Dahil</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcGenelSatisVergisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gsv-result">
            <div class="hc-result-item">
                <span>Net Matrah:</span>
                <strong id="hc-gsv-res-net">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Vergi Payı:</span>
                <strong id="hc-gsv-res-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Genel Toplam:</span>
                <strong class="hc-result-value" id="hc-gsv-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
