<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_protein_cozunurlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-protein-cozunurlugu-hesaplama',
        HC_PLUGIN_URL . 'modules/protein-cozunurlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-protein-cozunurlugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/protein-cozunurlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-protein-sol">
        <h3>Protein Çözünürlüğü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pc-total">Toplam Protein (mg/mL)</label>
            <input type="number" id="hc-pc-total" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-soluble">Çözünmüş Protein (mg/mL)</label>
            <input type="number" id="hc-pc-soluble" placeholder="Örn: 8">
        </div>
        <button class="hc-btn" onclick="hcProteinÇözünürlüğüHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pc-result">
            <div class="hc-result-label">Çözünürlük Yüzdesi:</div>
            <div class="hc-result-value" id="hc-pc-val">-</div>
        </div>
    </div>
    <?php
}
