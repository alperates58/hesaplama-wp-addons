<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_birim_vektor_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-birim-vektor-hesaplama', HC_PLUGIN_URL . 'modules/birim-vektor-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-birim-vektor-hesaplama-css', HC_PLUGIN_URL . 'modules/birim-vektor-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-birim-vektor-hesaplama">
        <h3>Birim Vektör Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bvh-boyut">Vektör Boyutu</label>
            <select id="hc-bvh-boyut" onchange="hcBirimVektorBoyutGuncelle()">
                <option value="2">2 Boyutlu (x, y)</option>
                <option value="3">3 Boyutlu (x, y, z)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-bvh-x">x Bileşeni</label>
            <input type="number" id="hc-bvh-x" placeholder="örn. 3" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-bvh-y">y Bileşeni</label>
            <input type="number" id="hc-bvh-y" placeholder="örn. 4" step="any" />
        </div>
        <div class="hc-form-group" id="hc-bvh-z-grup" style="display:none;">
            <label for="hc-bvh-z">z Bileşeni</label>
            <input type="number" id="hc-bvh-z" placeholder="örn. 0" step="any" />
        </div>
        <button class="hc-btn" onclick="hcBirimVektorHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-birim-vektor-hesaplama-result"></div>
    </div>
    <?php
}
