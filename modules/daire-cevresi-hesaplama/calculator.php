<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_daire_cevresi_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-daire-cevresi-hesaplama', HC_PLUGIN_URL . 'modules/daire-cevresi-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-daire-cevresi-hesaplama-css', HC_PLUGIN_URL . 'modules/daire-cevresi-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-daire-cevresi-hesaplama">
        <h3>Daire Çevresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dce-giris">Giriş Türü</label>
            <select id="hc-dce-giris" onchange="hcDaireCevresiGirisDegistir()">
                <option value="yaricap">Yarıçap (r)</option>
                <option value="cap">Çap (d)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-dce-deger" id="hc-dce-deger-label">Yarıçap (m)</label>
            <input type="number" id="hc-dce-deger" placeholder="m" step="any" min="0" />
        </div>
        <button class="hc-btn" onclick="hcDaireCevresiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-daire-cevresi-hesaplama-result"></div>
    </div>
    <?php
}
