<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gumruk_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gumruk-vergi',
        HC_PLUGIN_URL . 'modules/gumruk-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gumruk-vergi-css',
        HC_PLUGIN_URL . 'modules/gumruk-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gumruk-vergisi-hesaplama">
        <h3>Gümrük Vergisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gv-price">Ürün Fiyatı (Döviz Karşılığı TL)</label>
            <input type="number" id="hc-gv-price" placeholder="CIF Değeri">
        </div>

        <div class="hc-form-group">
            <label for="hc-gv-origin">Menşei Ülke</label>
            <select id="hc-gv-origin">
                <option value="0.20">Avrupa Birliği (%20)</option>
                <option value="0.30">Diğer Ülkeler (%30)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-gv-otv">Ek ÖTV Oranı (%)</label>
            <input type="number" id="hc-gv-otv" value="0">
        </div>
        
        <button class="hc-btn" onclick="hcGumrukVergisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gumruk-result">
            <div class="hc-result-item">
                <span>Gümrük Vergisi:</span>
                <strong id="hc-gv-res-gv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KDV (%20):</span>
                <strong id="hc-gv-res-kdv">-</strong>
            </div>
            <div class="hc-result-value" id="hc-gv-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam İthalat Maliyeti</p>
        </div>
    </div>
    <?php
}
