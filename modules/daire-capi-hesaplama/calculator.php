<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_daire_capi_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-daire-capi-hesaplama', HC_PLUGIN_URL . 'modules/daire-capi-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-daire-capi-hesaplama-css', HC_PLUGIN_URL . 'modules/daire-capi-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-daire-capi-hesaplama">
        <h3>Daire Çapı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dcp-kaynak">Verilen Büyüklük</label>
            <select id="hc-dcp-kaynak" onchange="hcDaireCapiKaynakDegistir()">
                <option value="yaricap">Yarıçap (r)</option>
                <option value="cevre">Çevre (C)</option>
                <option value="alan">Alan (A)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-dcp-deger" id="hc-dcp-deger-label">Yarıçap (m)</label>
            <input type="number" id="hc-dcp-deger" placeholder="m" step="any" min="0" />
        </div>
        <button class="hc-btn" onclick="hcDaireCapiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-daire-capi-hesaplama-result"></div>
    </div>
    <?php
}
