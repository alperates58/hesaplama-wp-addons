<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kiris_yuku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beam-load',
        HC_PLUGIN_URL . 'modules/kiris-yuku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beam-load-css',
        HC_PLUGIN_URL . 'modules/kiris-yuku-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beam-load">
        <h3>Kiriş Yükü & Tepki Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-bl-len">Kiriş Boyu (m):</label>
            <input type="number" id="hc-bl-len" step="0.1" placeholder="5.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-bl-load">Merkezi Tekil Yük (kN):</label>
            <input type="number" id="hc-bl-load" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-bl-dist">Yükün A Desteğine Uzaklığı (m):</label>
            <input type="number" id="hc-bl-dist" placeholder="2.5">
        </div>
        <button class="hc-btn" onclick="hcBeamLoadHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-beam-load-result">
            <div class="hc-bl-grid">
                <div class="hc-bl-item">
                    <strong>A Tepkisi (Ra)</strong>
                    <div id="hc-bl-res-ra">-</div>
                    <span>kN</span>
                </div>
                <div class="hc-bl-item">
                    <strong>B Tepkisi (Rb)</strong>
                    <div id="hc-bl-res-rb">-</div>
                    <span>kN</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
