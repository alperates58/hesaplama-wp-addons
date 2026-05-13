<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_milyon_firsatta_hata_dpmo_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-milyon-firsatta-hata-dpmo-hesaplama',
        HC_PLUGIN_URL . 'modules/milyon-firsatta-hata-dpmo-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-milyon-firsatta-hata-dpmo-hesaplama-css',
        HC_PLUGIN_URL . 'modules/milyon-firsatta-hata-dpmo-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-milyon-firsatta-hata-dpmo-hesaplama">
        <h3>DPMO Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dpmo-defects">Toplam Hata Sayısı</label>
            <input type="number" id="hc-dpmo-defects" min="0" placeholder="Örn: 25">
        </div>
        <div class="hc-form-group">
            <label for="hc-dpmo-units">Üretilen Toplam Birim Sayısı</label>
            <input type="number" id="hc-dpmo-units" min="1" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-dpmo-opps">Birim Başına Hata Fırsatı</label>
            <input type="number" id="hc-dpmo-opps" min="1" value="1">
        </div>
        <button class="hc-btn" onclick="hcDpmoHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-milyon-firsatta-hata-dpmo-hesaplama-result">
            <span class="hc-label">DPMO:</span>
            <div class="hc-result-value" id="hc-dpmo-res-val">0</div>
            <div id="hc-dpmo-res-sigma" style="margin-top:10px; font-weight:bold; color:#16a085;"></div>
        </div>
    </div>
    <?php
}
