<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kereste_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lumber-qty',
        HC_PLUGIN_URL . 'modules/kereste-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lumber-qty-css',
        HC_PLUGIN_URL . 'modules/kereste-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lumber-qty">
        <h3>Kereste Adet & Miktar Hesabı</h3>
        <div class="hc-lumber-grid">
            <div class="hc-form-group">
                <label>Kalınlık (cm):</label>
                <input type="number" id="hc-lq-t" placeholder="5">
            </div>
            <div class="hc-form-group">
                <label>Genişlik (cm):</label>
                <input type="number" id="hc-lq-w" placeholder="10">
            </div>
            <div class="hc-form-group">
                <label>Boy (m):</label>
                <input type="number" id="hc-lq-l" placeholder="3">
            </div>
            <div class="hc-form-group">
                <label>Adet:</label>
                <input type="number" id="hc-lq-n" placeholder="10">
            </div>
        </div>
        <button class="hc-btn" onclick="hcLumberQtyHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lumber-qty-result">
            <strong>Toplam Hacim:</strong>
            <div id="hc-lq-res-val" class="hc-result-value">-</div>
            <span>Metreküp (m³)</span>
        </div>
    </div>
    <?php
}
