<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kdv_dahil_haric_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kdv-dh',
        HC_PLUGIN_URL . 'modules/kdv-dahil-haric-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kdv-dh-css',
        HC_PLUGIN_URL . 'modules/kdv-dahil-haric-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kdv-dahil-haric-hesaplama">
        <h3>KDV Dahil Hariç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kdh-amount">Tutar (TL)</label>
            <input type="number" id="hc-kdh-amount" placeholder="Tutar giriniz">
        </div>

        <div class="hc-form-group">
            <label for="hc-kdh-rate">KDV Oranı (%)</label>
            <input type="number" id="hc-kdh-rate" value="20">
        </div>

        <div class="hc-form-group">
            <label for="hc-kdh-type">İşlem</label>
            <select id="hc-kdh-type">
                <option value="excl">KDV Hariç (KDV Ekle)</option>
                <option value="incl">KDV Dahil (KDV Çıkar)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcKDV_DH_Hesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kdv-dh-result">
            <div class="hc-result-item">
                <span>Matrah (Hariç):</span>
                <strong id="hc-kdh-res-net">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KDV Tutarı:</span>
                <strong id="hc-kdh-res-tax">-</strong>
            </div>
            <div class="hc-result-value" id="hc-kdh-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam (Dahil)</p>
        </div>
    </div>
    <?php
}
