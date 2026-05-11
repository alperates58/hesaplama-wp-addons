<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aktif_camur_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aktif-camur',
        HC_PLUGIN_URL . 'modules/aktif-camur-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aktif-camur-css',
        HC_PLUGIN_URL . 'modules/aktif-camur-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aktif-camur">
        <h3>Aktif Çamur Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ac-debi">Günlük Debi (Q)</label>
            <input type="number" id="hc-ac-debi" placeholder="m³/gün" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ac-bod">Giriş BOD₅ Konsantrasyonu (Sₒ)</label>
            <input type="number" id="hc-ac-bod" placeholder="mg/L" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ac-hacim">Havalandırma Havuzu Hacmi (V)</label>
            <input type="number" id="hc-ac-hacim" placeholder="m³" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ac-mlss">MLSS Konsantrasyonu (X)</label>
            <input type="number" id="hc-ac-mlss" placeholder="mg/L" step="1">
        </div>

        <button class="hc-btn" onclick="hcAktifCamurHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-aktif-camur-result">
            <div class="hc-result-item">
                <span>F/M Oranı:</span>
                <strong class="hc-result-value" id="hc-ac-res-fm">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Organik Yükleme:</span>
                <span id="hc-ac-res-yuk">-</span>
            </div>
            <div class="hc-result-note" id="hc-ac-res-note"></div>
        </div>
    </div>
    <?php
}
