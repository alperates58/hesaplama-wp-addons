<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dizi_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dizi-hesaplama', HC_PLUGIN_URL . 'modules/dizi-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dizi-hesaplama-css', HC_PLUGIN_URL . 'modules/dizi-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dizi-hesaplama">
        <h3>Dizi Hesaplama</h3>
        <div class="hc-form-group"><label for="hc-diz-tur">Dizi Türü</label>
            <select id="hc-diz-tur" onchange="hcDiziTurDegistir()">
                <option value="aritmetik">Aritmetik Dizi</option>
                <option value="geometrik">Geometrik Dizi</option>
            </select>
        </div>
        <div class="hc-form-group"><label for="hc-diz-a1">İlk Terim (a₁)</label><input type="number" id="hc-diz-a1" placeholder="örn. 2" step="any" /></div>
        <div class="hc-form-group"><label for="hc-diz-fark" id="hc-diz-fark-label">Ortak Fark (d)</label><input type="number" id="hc-diz-fark" placeholder="örn. 3" step="any" /></div>
        <div class="hc-form-group"><label for="hc-diz-n">n. Terim (n)</label><input type="number" id="hc-diz-n" placeholder="örn. 10" min="1" step="1" /></div>
        <button class="hc-btn" onclick="hcDiziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dizi-hesaplama-result"></div>
    </div>
    <?php
}
