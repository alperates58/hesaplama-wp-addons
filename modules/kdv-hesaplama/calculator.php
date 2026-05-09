<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kdv_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kdv',
        HC_PLUGIN_URL . 'modules/kdv-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kdv-css',
        HC_PLUGIN_URL . 'modules/kdv-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kdv-hesaplama">
        <h3>KDV Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kd-amount">Tutar (TL)</label>
            <input type="number" id="hc-kd-amount" placeholder="Hesaplanacak Tutar">
        </div>

        <div class="hc-form-group">
            <label for="hc-kd-rate">KDV Oranı (%)</label>
            <select id="hc-kd-rate">
                <option value="20">%20 (Genel)</option>
                <option value="10">%10 (Gıda/Tekstil vb.)</option>
                <option value="1">%1 (Temel Gıda vb.)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-kd-type">Hesaplama Yönü</label>
            <select id="hc-kd-type">
                <option value="excl">KDV Hariçten Dahile</option>
                <option value="incl">KDV Dahilden Harice</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcKDVHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kdv-result">
            <div class="hc-result-item">
                <span>Net Tutar (KDV Hariç):</span>
                <strong id="hc-kd-res-net">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KDV Tutarı:</span>
                <strong id="hc-kd-res-tax">-</strong>
            </div>
            <div class="hc-result-value" id="hc-kd-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Tutar (KDV Dahil)</p>
        </div>
    </div>
    <?php
}
