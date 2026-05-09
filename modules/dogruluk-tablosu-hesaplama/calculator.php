<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dogruluk_tablosu_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dogruluk-tablosu-hesaplama', HC_PLUGIN_URL . 'modules/dogruluk-tablosu-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dogruluk-tablosu-hesaplama-css', HC_PLUGIN_URL . 'modules/dogruluk-tablosu-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dogruluk-tablosu-hesaplama">
        <h3>Doğruluk Tablosu Hesaplama</h3>
        <div class="hc-form-group"><label for="hc-dtb-islem">Mantık İşlemi</label>
            <select id="hc-dtb-islem">
                <option value="and">AND (VE)</option>
                <option value="or">OR (VEYA)</option>
                <option value="xor">XOR (ÖZEL VEYA)</option>
                <option value="not">NOT (DEĞİL) — tek girişli</option>
                <option value="nand">NAND (VE DEĞİL)</option>
                <option value="nor">NOR (VEYA DEĞİL)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDogrulukTablosuOlustur()">Tabloyu Oluştur</button>
        <div class="hc-result" id="hc-dogruluk-tablosu-hesaplama-result"></div>
    </div>
    <?php
}
