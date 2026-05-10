<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sifir_atik_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sifir-atik-skoru-hesaplama',
        HC_PLUGIN_URL . 'modules/sifir-atik-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sifir-atik-skoru-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sifir-atik-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-zero-waste">
        <h3>Sıfır Atık Skoru</h3>
        <div class="hc-form-group">
            <label>Alışkanlıklar</label>
            <div class="hc-check-list">
                <label><input type="checkbox" class="hc-zw-point" value="20"> Atıkları kaynağında ayrıştırıyorum (Kağıt, cam, metal)</label>
                <label><input type="checkbox" class="hc-zw-point" value="20"> Kompost yapıyorum</label>
                <label><input type="checkbox" class="hc-zw-point" value="15"> Alışverişte bez çanta kullanıyorum</label>
                <label><input type="checkbox" class="hc-zw-point" value="15"> Matara ve çok kullanımlık bardak kullanıyorum</label>
                <label><input type="checkbox" class="hc-zw-point" value="10"> Tek kullanımlık plastiklerden kaçınıyorum</label>
                <label><input type="checkbox" class="hc-zw-point" value="10"> Tamir edilebilir ürünleri tercih ediyorum</label>
                <label><input type="checkbox" class="hc-zw-point" value="10"> İkinci el ürünleri tercih ediyorum</label>
            </div>
        </div>
        <button class="hc-btn" onclick="hcSıfırAtıkSkoruHesapla()">Skoru Hesapla</button>
        <div class="hc-result" id="hc-zw-result">
            <div class="hc-result-label">Sıfır Atık Skoru:</div>
            <div class="hc-result-value" id="hc-zw-val">-</div>
            <p id="hc-zw-status" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
