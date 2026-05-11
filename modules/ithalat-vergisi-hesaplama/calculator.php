<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ithalat_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ithalat-vergisi-hesaplama',
        HC_PLUGIN_URL . 'modules/ithalat-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ithalat-vergisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ithalat-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ithalat-vergisi">
        <h3>İthalat Vergisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-iv-cif">CIF Bedeli (Eşya + Sigorta + Navlun ₺)</label>
            <input type="number" id="hc-iv-cif" placeholder="Örn: 100.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-iv-gumruk">Gümrük Vergisi Oranı (%)</label>
            <input type="number" id="hc-iv-gumruk" placeholder="Örn: 10" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-iv-kdv">KDV Oranı (%)</label>
            <select id="hc-iv-kdv">
                <option value="20">%20</option>
                <option value="10">%10</option>
                <option value="1">%1</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-iv-other">Diğer Masraflar (₺)</label>
            <input type="number" id="hc-iv-other" placeholder="Örn: 5.000">
        </div>
        <button class="hc-btn" onclick="hcIthalatVergisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-iv-result">
            <div class="hc-result-item">
                <span>Gümrük Vergisi Tutarı:</span>
                <strong id="hc-iv-res-gumruk">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KDV Tutarı:</span>
                <strong id="hc-iv-res-kdv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam İthalat Maliyeti:</span>
                <strong class="hc-result-value" id="hc-iv-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
