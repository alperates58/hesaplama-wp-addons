<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kirma_tas_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gravel-calc',
        HC_PLUGIN_URL . 'modules/kirma-tas-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gravel-calc-css',
        HC_PLUGIN_URL . 'modules/kirma-tas-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gravel">
        <h3>Kırma Taş (Mıcır) Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-gc-area">Doldurulacak Alan (m²):</label>
            <input type="number" id="hc-gc-area" step="0.1" placeholder="50.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-gc-thick">Katman Kalınlığı (cm):</label>
            <input type="number" id="hc-gc-thick" step="1" value="10">
        </div>
        <button class="hc-btn" onclick="hcGravelCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gravel-result">
            <div class="hc-gravel-grid">
                <div class="hc-gravel-item">
                    <strong>Hacim</strong>
                    <div id="hc-gc-res-vol">-</div>
                    <span>m³</span>
                </div>
                <div class="hc-gravel-item">
                    <strong>Ağırlık</strong>
                    <div id="hc-gc-res-ton">-</div>
                    <span>Ton</span>
                </div>
            </div>
            <p style="margin-top:15px; font-size:0.8rem;">Yoğunluk 1.55 ton/m³ baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
