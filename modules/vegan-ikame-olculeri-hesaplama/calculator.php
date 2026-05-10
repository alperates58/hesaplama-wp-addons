<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vegan_ikame_olculeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vegan-sub',
        HC_PLUGIN_URL . 'modules/vegan-ikame-olculeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vegan-sub-calc">
        <h3>Vegan İkame Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-vs-type">Değiştirilecek Malzeme:</label>
            <select id="hc-vs-type">
                <option value="egg">Yumurta (Adet)</option>
                <option value="milk">Süt (ml)</option>
                <option value="butter">Tereyağı (g)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-vs-val">Miktar:</label>
            <input type="number" id="hc-vs-val" placeholder="1">
        </div>
        <button class="hc-btn" onclick="hcVeganSubHesapla()">Alternatifleri Gör</button>
        <div class="hc-result" id="hc-vegan-sub-result">
            <strong>Vegan Seçenekler:</strong>
            <div id="hc-vs-res-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
