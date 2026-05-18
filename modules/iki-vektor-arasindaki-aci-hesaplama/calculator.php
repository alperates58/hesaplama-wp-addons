<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iki_vektor_arasindaki_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iki-vektor-arasindaki-aci-hesaplama',
        HC_PLUGIN_URL . 'modules/iki-vektor-arasindaki-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-iki-vektor-arasindaki-aci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/iki-vektor-arasindaki-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-iki-vektor-arasindaki-aci-hesaplama">
        <h3>İki Vektör Arasındaki Açı Hesaplama</h3>
        
        <div style="display: flex; gap: 15px; margin-bottom: 15px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 140px;">
                <h4 style="margin-top: 0;">A Vektörü</h4>
                <div class="hc-form-group">
                    <label for="hc-iva-ax">Ax Bileşeni</label>
                    <input type="number" step="any" id="hc-iva-ax" value="3" placeholder="Ax" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-iva-ay">Ay Bileşeni</label>
                    <input type="number" step="any" id="hc-iva-ay" value="4" placeholder="Ay" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-iva-az">Az Bileşeni (3D için)</label>
                    <input type="number" step="any" id="hc-iva-az" value="0" placeholder="Az (2D için 0 girin)" required>
                </div>
            </div>
            
            <div style="flex: 1; min-width: 140px;">
                <h4 style="margin-top: 0;">B Vektörü</h4>
                <div class="hc-form-group">
                    <label for="hc-iva-bx">Bx Bileşeni</label>
                    <input type="number" step="any" id="hc-iva-bx" value="1" placeholder="Bx" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-iva-by">By Bileşeni</label>
                    <input type="number" step="any" id="hc-iva-by" value="2" placeholder="By" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-iva-bz">Bz Bileşeni (3D için)</label>
                    <input type="number" step="any" id="hc-iva-bz" value="0" placeholder="Bz (2D için 0 girin)" required>
                </div>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcIkiVektorArasindakiAciHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-iki-vektor-arasindaki-aci-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
