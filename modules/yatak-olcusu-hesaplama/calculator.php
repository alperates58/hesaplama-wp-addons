<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yatak_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bed-size',
        HC_PLUGIN_URL . 'modules/yatak-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bed-size-css',
        HC_PLUGIN_URL . 'modules/yatak-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bed-size">
        <h3>Yatak Ölçüsü Rehberi</h3>
        <div class="hc-form-group">
            <label for="hc-bed-type">Yatak Tipi</label>
            <select id="hc-bed-type" onchange="hcBedSizeGuncelle()">
                <option value="90x190">Tek Kişilik Standard (90x190 cm)</option>
                <option value="100x200">Tek Kişilik XL (100x200 cm)</option>
                <option value="120x200">Tek Kişilik Geniş (120x200 cm)</option>
                <option value="140x190">Çift Kişilik Küçük (140x190 cm)</option>
                <option value="150x200">Çift Kişilik Standart (150x200 cm)</option>
                <option value="160x200">Queen Size (160x200 cm)</option>
                <option value="180x200">King Size (180x200 cm)</option>
                <option value="200x200">Battal Boy (200x200 cm)</option>
            </select>
        </div>
        <div class="hc-result visible" id="hc-bed-size-result">
            <div class="hc-bed-visual">
                <div id="hc-bed-box"></div>
            </div>
            <div class="hc-result-item">
                <span>Genişlik:</span>
                <b id="hc-res-bed-w">90 cm</b>
            </div>
            <div class="hc-result-item">
                <span>Uzunluk:</span>
                <b id="hc-res-bed-l">190 cm</b>
            </div>
            <p class="hc-bed-advice" id="hc-res-bed-advice">Bu yatak için en az 250x300 cm boyutunda bir oda önerilir.</p>
        </div>
    </div>
    <?php
}
