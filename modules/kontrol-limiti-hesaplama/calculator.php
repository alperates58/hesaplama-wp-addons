<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kontrol_limiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kontrol-limiti-hesaplama',
        HC_PLUGIN_URL . 'modules/kontrol-limiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kontrol-limiti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kontrol-limiti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kontrol-limiti">
        <h3>Kontrol Limiti (UCL / LCL) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ctrl-data">Veri Seti (Gözlemler):</label>
            <textarea id="hc-ctrl-data" class="hc-input" placeholder="Örn: 10.2, 10.5, 9.8, 10.1, 10.3"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-ctrl-sigma">Kontrol Seviyesi (Z - Genellikle 3):</label>
            <input type="number" id="hc-ctrl-sigma" class="hc-input" value="3" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcKontrolLimitiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kontrol-limiti-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Ortalama (X-Bar):</span>
                    <strong id="hc-res-ctrl-mean">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Standart Sapma (σ):</span>
                    <strong id="hc-res-ctrl-std">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Üst Limit (UCL):</span>
                    <strong id="hc-res-ctrl-ucl">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Alt Limit (LCL):</span>
                    <strong id="hc-res-ctrl-lcl">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
