<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-birthstone',
        HC_PLUGIN_URL . 'modules/dogum-tasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-birthstone-calc">
        <h3>Doğum Taşı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğduğunuz Ay</label>
            <select id="hc-bt-month" class="hc-input">
                <option value="1">Ocak</option>
                <option value="2">Şubat</option>
                <option value="3">Mart</option>
                <option value="4">Nisan</option>
                <option value="5">Mayıs</option>
                <option value="6">Haziran</option>
                <option value="7">Temmuz</option>
                <option value="8">Ağustos</option>
                <option value="9">Eylül</option>
                <option value="10">Ekim</option>
                <option value="11">Kasım</option>
                <option value="12">Aralık</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDogumTasiHesapla()">Taşımı Bul</button>
        <div class="hc-result" id="hc-dogum-tasi-result">
            <div class="hc-result-header">Sizin Doğum Taşınız: <span id="hc-bt-value" class="hc-result-value"></span></div>
            <div id="hc-bt-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
