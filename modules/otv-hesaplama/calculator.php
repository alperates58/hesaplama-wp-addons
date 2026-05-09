<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_otv_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-otv-vergi',
        HC_PLUGIN_URL . 'modules/otv-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-otv-vergi-css',
        HC_PLUGIN_URL . 'modules/otv-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-otv-hesaplama">
        <h3>ÖTV Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ot-price">Vergisiz Fiyat (TL)</label>
            <input type="number" id="hc-ot-price" placeholder="Matrah">
        </div>

        <div class="hc-form-group">
            <label for="hc-ot-rate">ÖTV Oranı (%)</label>
            <select id="hc-ot-rate">
                <option value="80">Otomobil (Standart - %80)</option>
                <option value="45">Otomobil (Düşük - %45)</option>
                <option value="150">Otomobil (Lüks - %150)</option>
                <option value="20">Elektronik (%20)</option>
                <option value="6.7">Beyaz Eşya (%6.7)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcOTV_Hesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-otv-result">
            <div class="hc-result-item">
                <span>ÖTV Tutarı:</span>
                <strong id="hc-ot-res-otv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KDV Tutarı (%20):</span>
                <strong id="hc-ot-res-kdv">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ot-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Satış Fiyatı (Vergiler Dahil)</p>
        </div>
    </div>
    <?php
}
