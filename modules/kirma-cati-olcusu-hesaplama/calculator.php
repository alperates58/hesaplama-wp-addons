<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kirma_cati_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hip-roof',
        HC_PLUGIN_URL . 'modules/kirma-cati-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hip-roof-css',
        HC_PLUGIN_URL . 'modules/kirma-cati-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hip-roof">
        <h3>Kırma Çatı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hr-width">Bina Genişliği (m):</label>
            <input type="number" id="hc-hr-width" step="0.1" placeholder="8.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-hr-length">Bina Uzunluğu (m):</label>
            <input type="number" id="hc-hr-length" step="0.1" placeholder="12.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-hr-pitch">Çatı Eğimi (Derece °):</label>
            <input type="number" id="hc-hr-pitch" value="30">
        </div>
        <button class="hc-btn" onclick="hcHipRoofHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hip-roof-result">
            <div class="hc-roof-grid">
                <div class="hc-roof-item">
                    <strong>Toplam Alan</strong>
                    <div id="hc-hr-res-area">-</div>
                    <span>m²</span>
                </div>
                <div class="hc-roof-item">
                    <strong>Mertek Boyu</strong>
                    <div id="hc-hr-res-rafter">-</div>
                    <span>m</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
