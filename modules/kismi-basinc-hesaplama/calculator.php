<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kismi_basinc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kismi-basinc-hesaplama',
        HC_PLUGIN_URL . 'modules/kismi-basinc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kismi-basinc-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kismi-basinc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-partial-pressure">
        <h3>Kısmi Basınç Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pp-total">Toplam Basınç (atm / bar)</label>
            <input type="number" id="hc-pp-total" placeholder="Örn: 1.5">
        </div>
        <hr>
        <div id="hc-pp-gases">
            <div class="hc-form-group">
                <label>Gaz 1 Mol Sayısı</label>
                <input type="number" class="hc-pp-mol" placeholder="Örn: 2">
            </div>
            <div class="hc-form-group">
                <label>Gaz 2 Mol Sayısı</label>
                <input type="number" class="hc-pp-mol" placeholder="Örn: 3">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcAddPartialPressureInput()" style="margin-bottom:10px;">+ Gaz Ekle</button>
        <button class="hc-btn" onclick="hcKısmiBasınçHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pp-result">
            <div id="hc-pp-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
