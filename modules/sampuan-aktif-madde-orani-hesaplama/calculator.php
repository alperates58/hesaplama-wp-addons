<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sampuan_aktif_madde_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sampuan-aktif-madde-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/sampuan-aktif-madde-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sampuan-aktif-madde-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sampuan-aktif-madde-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-shampoo">
        <h3>Şampuan Aktif Madde Hesaplama</h3>
        <div id="hc-sa-ingredients">
            <div class="hc-form-group hc-sa-row">
                <input type="text" placeholder="Sürfaktan Adı" style="width:40%">
                <input type="number" class="hc-sa-percent" placeholder="Kullanım %" style="width:28%">
                <input type="number" class="hc-sa-active" placeholder="Aktiflik %" style="width:28%">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcAddShampooIngredient()" style="margin-bottom:10px;">+ Madde Ekle</button>
        <button class="hc-btn" onclick="hcŞampuanAktifMaddeOranıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sa-result">
            <div class="hc-result-label">Toplam Aktif Madde (ASM):</div>
            <div class="hc-result-value" id="hc-sa-val">-</div>
            <p id="hc-sa-desc" style="font-size:0.9em; margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
