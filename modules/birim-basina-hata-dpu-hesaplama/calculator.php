<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_birim_basina_hata_dpu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-birim-basina-hata-dpu-hesaplama',
        HC_PLUGIN_URL . 'modules/birim-basina-hata-dpu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-birim-basina-hata-dpu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/birim-basina-hata-dpu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dpu-calc">
        <h3>Birim Başına Hata (DPU) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dpu-defects">Toplam Hata (Defect) Sayısı:</label>
            <input type="number" id="hc-dpu-defects" class="hc-input" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-dpu-units">Toplam Birim (Unit) Sayısı:</label>
            <input type="number" id="hc-dpu-units" class="hc-input" placeholder="Örn: 1000">
        </div>
        <button class="hc-btn" onclick="hcDPUHesapla()">DPU Hesapla</button>
        <div class="hc-result" id="hc-birim-basina-hata-dpu-hesaplama-result">
            <div class="hc-result-label">Birim Başına Hata (DPU):</div>
            <div class="hc-result-value" id="hc-res-dpu-val">-</div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Formül: DPU = Toplam Hata / Toplam Birim</p>
        </div>
    </div>
    <?php
}
