<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_porsiyon_yaag_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-port-fat',
        HC_PLUGIN_URL . 'modules/porsiyon-yaag-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-port-fat-calc">
        <h3>Yağ Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-pf-type">Gıda / Yöntem:</label>
            <select id="hc-pf-type">
                <option value="15">Kızartma (Genel - %15)</option>
                <option value="10">Kırmızı Et (Yağlı - %10)</option>
                <option value="2">Izgara Tavuk (Göğüs - %2)</option>
                <option value="82">Tereyağı / Margarin (%82)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-pf-weight">Miktar (Gram):</label>
            <input type="number" id="hc-pf-weight" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcPortFatHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-porsiyon-yaag-result">
            <strong>Toplam Yağ:</strong>
            <div id="hc-pf-res" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
