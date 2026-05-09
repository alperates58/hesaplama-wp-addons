<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_cevre_uzunlugu_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-cevre-uzunlugu-hesaplama', HC_PLUGIN_URL . 'modules/cevre-uzunlugu-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-cevre-uzunlugu-hesaplama-css', HC_PLUGIN_URL . 'modules/cevre-uzunlugu-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-cevre-uzunlugu-hesaplama">
        <h3>Çevre Uzunluğu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cuh-sekil">Şekil Türü</label>
            <select id="hc-cuh-sekil" onchange="hcCevreSekilDegistir()">
                <option value="kare">Kare</option>
                <option value="dikdortgen">Dikdörtgen</option>
                <option value="ucgen">Üçgen</option>
                <option value="daire">Daire (Çember)</option>
                <option value="cokgen">Düzgün Çokgen</option>
            </select>
        </div>
        <div id="hc-cuh-kare-grup">
            <div class="hc-form-group"><label for="hc-cuh-kare-a">Kenar (m)</label><input type="number" id="hc-cuh-kare-a" placeholder="m" step="any" /></div>
        </div>
        <div id="hc-cuh-dikdortgen-grup" style="display:none;">
            <div class="hc-form-group"><label for="hc-cuh-dk-en">En (m)</label><input type="number" id="hc-cuh-dk-en" placeholder="m" step="any" /></div>
            <div class="hc-form-group"><label for="hc-cuh-dk-boy">Boy (m)</label><input type="number" id="hc-cuh-dk-boy" placeholder="m" step="any" /></div>
        </div>
        <div id="hc-cuh-ucgen-grup" style="display:none;">
            <div class="hc-form-group"><label for="hc-cuh-uc-a">Kenar a (m)</label><input type="number" id="hc-cuh-uc-a" placeholder="m" step="any" /></div>
            <div class="hc-form-group"><label for="hc-cuh-uc-b">Kenar b (m)</label><input type="number" id="hc-cuh-uc-b" placeholder="m" step="any" /></div>
            <div class="hc-form-group"><label for="hc-cuh-uc-c">Kenar c (m)</label><input type="number" id="hc-cuh-uc-c" placeholder="m" step="any" /></div>
        </div>
        <div id="hc-cuh-daire-grup" style="display:none;">
            <div class="hc-form-group"><label for="hc-cuh-da-r">Yarıçap (m)</label><input type="number" id="hc-cuh-da-r" placeholder="m" step="any" /></div>
        </div>
        <div id="hc-cuh-cokgen-grup" style="display:none;">
            <div class="hc-form-group"><label for="hc-cuh-ck-n">Kenar Sayısı</label><input type="number" id="hc-cuh-ck-n" placeholder="örn. 6" min="3" step="1" /></div>
            <div class="hc-form-group"><label for="hc-cuh-ck-a">Kenar Uzunluğu (m)</label><input type="number" id="hc-cuh-ck-a" placeholder="m" step="any" /></div>
        </div>
        <button class="hc-btn" onclick="hcCevreUzunluguHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cevre-uzunlugu-hesaplama-result"></div>
    </div>
    <?php
}
