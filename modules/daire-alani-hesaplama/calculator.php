<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_daire_alani_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-daire-alani-hesaplama', HC_PLUGIN_URL . 'modules/daire-alani-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-daire-alani-hesaplama-css', HC_PLUGIN_URL . 'modules/daire-alani-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-daire-alani-hesaplama">
        <h3>Daire Alanı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dal-giris-turu">Giriş Türü</label>
            <select id="hc-dal-giris-turu" onchange="hcDaireAlaniGirisDegistir()">
                <option value="yaricap">Yarıçap (r)</option>
                <option value="cap">Çap (d)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-dal-deger" id="hc-dal-deger-label">Yarıçap (m)</label>
            <input type="number" id="hc-dal-deger" placeholder="m" step="any" min="0" />
        </div>
        <button class="hc-btn" onclick="hcDaireAlaniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-daire-alani-hesaplama-result"></div>
    </div>
    <?php
}
