<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_parfum_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-parfum-seyreltme-hesaplama',
        HC_PLUGIN_URL . 'modules/parfum-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-parfum-seyreltme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/parfum-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-perfume">
        <h3>Parfüm Seyreltme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ps-type">Parfüm Tipi</label>
            <select id="hc-ps-type" onchange="hcPerfumeTypeChange()">
                <option value="20">Eau de Parfum (EDP) - ~%20</option>
                <option value="10">Eau de Toilette (EDT) - ~%10</option>
                <option value="5">Eau de Cologne (EDC) - ~%5</option>
                <option value="custom">Özel Oran</option>
            </select>
        </div>
        <div id="hc-ps-custom-row" class="hc-form-group" style="display:none;">
            <label for="hc-ps-percent">Esans Oranı (%)</label>
            <input type="number" id="hc-ps-percent" value="15">
        </div>
        <div class="hc-form-group">
            <label for="hc-ps-total">Hedef Toplam Hacim (mL)</label>
            <input type="number" id="hc-ps-total" placeholder="Örn: 50">
        </div>
        <button class="hc-btn" onclick="hcParfümSeyreltmeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ps-result">
            <div id="hc-ps-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
