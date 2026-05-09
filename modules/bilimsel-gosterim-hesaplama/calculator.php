<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bilimsel_gosterim_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-bilimsel-gosterim-hesaplama', HC_PLUGIN_URL . 'modules/bilimsel-gosterim-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-bilimsel-gosterim-hesaplama-css', HC_PLUGIN_URL . 'modules/bilimsel-gosterim-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-bilimsel-gosterim-hesaplama">
        <h3>Bilimsel Gösterim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bgh-mod">İşlem Yönü</label>
            <select id="hc-bgh-mod">
                <option value="normal2bilimsel">Ondalık → Bilimsel Gösterim</option>
                <option value="bilimsel2normal">Bilimsel Gösterim → Ondalık</option>
            </select>
        </div>
        <div id="hc-bgh-grup-normal">
            <div class="hc-form-group">
                <label for="hc-bgh-sayi">Sayı</label>
                <input type="number" id="hc-bgh-sayi" placeholder="örn. 0.000045 veya 12500000" step="any" />
            </div>
        </div>
        <div id="hc-bgh-grup-bilimsel" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-bgh-katsayi">Katsayı (a)</label>
                <input type="number" id="hc-bgh-katsayi" placeholder="örn. 4.5" step="any" />
            </div>
            <div class="hc-form-group">
                <label for="hc-bgh-ust">Üs (n)</label>
                <input type="number" id="hc-bgh-ust" placeholder="örn. -5" step="1" />
            </div>
        </div>
        <button class="hc-btn" onclick="hcBilimselGosterimHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bilimsel-gosterim-hesaplama-result"></div>
    </div>
    <?php
}
