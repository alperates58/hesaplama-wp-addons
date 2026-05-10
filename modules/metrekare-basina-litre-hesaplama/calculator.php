<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metrekare_basina_litre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-liter-per-sqm',
        HC_PLUGIN_URL . 'modules/metrekare-basina-litre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-liter-per-sqm-css',
        HC_PLUGIN_URL . 'modules/metrekare-basina-litre-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-liter-sqm">
        <h3>Sıvı Sarfiyatı (Litre) Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-ls-area">Toplam Alan (m²):</label>
            <input type="number" id="hc-ls-area" step="0.1" placeholder="100.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ls-rate">m² Başına Sarfiyat (Litre):</label>
            <input type="number" id="hc-ls-rate" step="0.01" placeholder="0.15">
            <small>Ürün kutusunun üzerinde yazar (Örn: 0.15 L/m²).</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-ls-coats">Kat Sayısı:</label>
            <input type="number" id="hc-ls-coats" value="2" min="1">
        </div>
        <button class="hc-btn" onclick="hcLiterSqmHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-liter-sqm-result">
            <strong>Gereken Toplam Miktar:</strong>
            <div id="hc-ls-res-val" class="hc-result-value">-</div>
            <span>Litre (L)</span>
        </div>
    </div>
    <?php
}
