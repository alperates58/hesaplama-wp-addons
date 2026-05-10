<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_parke_tasi_kum_yatagi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-paver-sand',
        HC_PLUGIN_URL . 'modules/parke-tasi-kum-yatagi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-paver-sand-css',
        HC_PLUGIN_URL . 'modules/parke-tasi-kum-yatagi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-paver-sand">
        <h3>Kum Yatağı (Zemin) Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-ps-area">Toplam Alan (m²):</label>
            <input type="number" id="hc-ps-area" step="0.1" placeholder="50.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ps-thick">Kum Kalınlığı (cm):</label>
            <input type="number" id="hc-ps-thick" step="0.5" value="5.0">
            <small>Genellikle 3-5 cm arasıdır.</small>
        </div>
        <button class="hc-btn" onclick="hcPaverSandHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-paver-sand-result">
            <div class="hc-sand-grid">
                <div class="hc-sand-item">
                    <strong>Hacim</strong>
                    <div id="hc-ps-res-vol">-</div>
                    <span>Metreküp (m³)</span>
                </div>
                <div class="hc-sand-item">
                    <strong>Ağırlık</strong>
                    <div id="hc-ps-res-ton">-</div>
                    <span>Ton</span>
                </div>
            </div>
            <p style="margin-top:15px; font-size:0.8rem;">Yoğunluk 1.6 ton/m³ baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
