<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_koltuk_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-koltuk-olcusu-hesaplama',
        HC_PLUGIN_URL . 'modules/koltuk-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-koltuk-olcusu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/koltuk-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sofa">
        <h3>Koltuk Ölçüsü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sofa-persons">Kaç Kişilik Koltuk?</label>
            <input type="number" id="hc-sofa-persons" value="3" min="1" max="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-sofa-type">Koltuk Tipi</label>
            <select id="hc-sofa-type">
                <option value="standard">Standart (Kişi başı 60cm)</option>
                <option value="comfort" selected>Konforlu (Kişi başı 80cm)</option>
                <option value="wide">Geniş / Lüks (Kişi başı 100cm)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKoltukÖlçüsüHesapla()">Boyutu Hesapla</button>
        <div class="hc-result" id="hc-sofa-result">
            <div class="hc-result-label">Tahmini Genişlik:</div>
            <div class="hc-result-value" id="hc-sofa-val">-</div>
            <p id="hc-sofa-info" style="margin-top: 10px; font-size: 0.9em; color: #666;"></p>
        </div>
    </div>
    <?php
}
