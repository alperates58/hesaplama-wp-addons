<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fayans_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tile-calc',
        HC_PLUGIN_URL . 'modules/fayans-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tile-calc-css',
        HC_PLUGIN_URL . 'modules/fayans-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tile-calc">
        <h3>Fayans / Seramik Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-tc-area">Kaplanacak Toplam Alan (m²):</label>
            <input type="number" id="hc-tc-area" step="0.1" placeholder="15.0">
        </div>
        <div class="hc-tile-size-row">
            <div class="hc-form-group">
                <label>Fayans Boyutu (cm):</label>
                <div style="display:flex; gap:10px;">
                    <input type="number" id="hc-tc-tile-w" placeholder="30">
                    <input type="number" id="hc-tc-tile-h" placeholder="60">
                </div>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-tc-box">Kutu Başı Alan (m²) - Opsiyonel:</label>
            <input type="number" id="hc-tc-box" step="0.01" placeholder="1.44">
        </div>
        <button class="hc-btn" onclick="hcTileCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tile-calc-result">
            <div class="hc-tile-grid">
                <div class="hc-tile-item">
                    <strong>Gereken Adet</strong>
                    <div id="hc-tc-res-pcs">-</div>
                    <span>Adet</span>
                </div>
                <div class="hc-tile-item">
                    <strong>Gereken Kutu</strong>
                    <div id="hc-tc-res-box">-</div>
                    <span>Kutu</span>
                </div>
            </div>
            <p style="margin-top:15px; font-size:0.8rem;">%10 fire payı eklenmiştir.</p>
        </div>
    </div>
    <?php
}
