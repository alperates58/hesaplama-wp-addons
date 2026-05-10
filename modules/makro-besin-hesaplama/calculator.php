<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_makro_besin_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-macros',
        HC_PLUGIN_URL . 'modules/makro-besin-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-macros-css',
        HC_PLUGIN_URL . 'modules/makro-besin-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-macros">
        <h3>Makro Besin Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-m-calories">Günlük Toplam Kalori (kcal):</label>
            <input type="number" id="hc-m-calories" placeholder="2000">
        </div>
        <div class="hc-form-group">
            <label for="hc-m-goal">Beslenme Tipi:</label>
            <select id="hc-m-goal">
                <option value="balanced">Dengeli (%40 Karb, %30 Prot, %30 Yağ)</option>
                <option value="lowcarb">Düşük Karbonhidrat (%25 Karb, %40 Prot, %35 Yağ)</option>
                <option value="highcarb">Yüksek Karbonhidrat (%60 Karb, %20 Prot, %20 Yağ)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMacrosHesapla()">Makroları Gör</button>
        <div class="hc-result" id="hc-macros-result">
            <div class="hc-m-grid">
                <div class="hc-m-box prot">
                    <strong>Protein</strong>
                    <div id="hc-m-res-prot">-</div>
                    <span>gram</span>
                </div>
                <div class="hc-m-box carb">
                    <strong>Karb</strong>
                    <div id="hc-m-res-carb">-</div>
                    <span>gram</span>
                </div>
                <div class="hc-m-box fat">
                    <strong>Yağ</strong>
                    <div id="hc-m-res-fat">-</div>
                    <span>gram</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
