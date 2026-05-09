<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kidem_tavani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kidem-tavan',
        HC_PLUGIN_URL . 'modules/kidem-tavani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kidem-tavan-css',
        HC_PLUGIN_URL . 'modules/kidem-tavani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kidem-tavani-hesaplama">
        <h3>Kıdem Tavanı Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-kt-salary">Brüt Maaş (TL)</label>
            <input type="number" id="hc-kt-salary" placeholder="Aylık Brüt Kazanç">
        </div>

        <div class="hc-form-group">
            <label for="hc-kt-years">Çalışma Süresi (Yıl)</label>
            <input type="number" id="hc-kt-years" placeholder="Örn: 5">
        </div>
        
        <button class="hc-btn" onclick="hcKidemTavanHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kidem-tavan-result">
            <div class="hc-result-item">
                <span>2026 Kıdem Tavanı:</span>
                <strong>64.948,77 ₺</strong>
            </div>
            <div class="hc-result-item">
                <span>Esas Alınan Brüt:</span>
                <strong id="hc-kt-res-base">-</strong>
            </div>
            <div class="hc-result-value" id="hc-kt-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Maksimum Brüt Kıdem Tazminatı</p>
        </div>
    </div>
    <?php
}
