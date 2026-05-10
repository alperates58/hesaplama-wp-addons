<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_antrenman_yuku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-antrenman-yuku-hesaplama',
        HC_PLUGIN_URL . 'modules/antrenman-yuku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-antrenman-yuku-hesaplama-css',
        HC_PLUGIN_URL . 'modules/antrenman-yuku-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-load">
        <h3>Antrenman Yükü ve Hacmi</h3>
        <div id="hc-load-sets-container">
            <div class="hc-load-set">
                <input type="number" class="hc-load-weight" placeholder="Ağırlık (kg)" step="0.5">
                <input type="number" class="hc-load-reps" placeholder="Tekrar">
                <input type="number" class="hc-load-sets" placeholder="Set" value="1">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcAddLoadSet()" style="margin-bottom: 15px;">+ Egzersiz Ekle</button>
        <button class="hc-btn" onclick="hcAntrenmanYukuHesapla()">Hacmi Hesapla</button>
        
        <div class="hc-result" id="hc-load-result">
            <div class="hc-result-label">Toplam Antrenman Hacmi:</div>
            <div class="hc-result-value" id="hc-load-val">-</div>
            <div id="hc-load-stats" style="margin-top: 10px; font-size: 0.9em;"></div>
        </div>
    </div>
    <?php
}
