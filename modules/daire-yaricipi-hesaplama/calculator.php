<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_daire_yaricipi_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-daire-yaricipi-hesaplama', HC_PLUGIN_URL . 'modules/daire-yaricipi-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-daire-yaricipi-hesaplama-css', HC_PLUGIN_URL . 'modules/daire-yaricipi-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-daire-yaricipi-hesaplama">
        <h3>Daire Yarıçapı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dyr-kaynak">Verilen Büyüklük</label>
            <select id="hc-dyr-kaynak" onchange="hcDaireYaricapiKaynakDegistir()">
                <option value="cap">Çap (d)</option>
                <option value="cevre">Çevre (C)</option>
                <option value="alan">Alan (A)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-dyr-deger" id="hc-dyr-deger-label">Çap (m)</label>
            <input type="number" id="hc-dyr-deger" placeholder="m" step="any" min="0" />
        </div>
        <button class="hc-btn" onclick="hcDaireYaricapiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-daire-yaricipi-hesaplama-result"></div>
    </div>
    <?php
}
