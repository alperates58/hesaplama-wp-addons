<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kendinden_kabaran_un_karisimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-self-rising-js',
        HC_PLUGIN_URL . 'modules/kendinden-kabaran-un-karisimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-self-rising-css',
        HC_PLUGIN_URL . 'modules/kendinden-kabaran-un-karisimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-self-rising">
        <h3>Kendinden Kabaran Un Karışımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-sr-flour">Normal Un Miktarı (Gram)</label>
            <input type="number" id="hc-sr-flour" value="500" step="10">
        </div>

        <button class="hc-btn" onclick="hcKabaranUnHesapla()">Karışımı Hesapla</button>

        <div class="hc-result" id="hc-self-rising-result">
            <div class="hc-result-item">
                <span>Kabartma Tozu:</span>
                <strong id="hc-sr-res-bp">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tuz:</span>
                <strong id="hc-sr-res-salt">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama: 100g un için 6g (yaklaşık 1.2 çay kaşığı) kabartma tozu ve 1g tuz baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
