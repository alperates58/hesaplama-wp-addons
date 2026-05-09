<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sigorta_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fuse-capacity',
        HC_PLUGIN_URL . 'modules/sigorta-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fuse-capacity-css',
        HC_PLUGIN_URL . 'modules/sigorta-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fuse-capacity">
        <h3>Sigorta Akımı Seçimi</h3>
        <div class="hc-form-group">
            <label for="hc-fc-p">Toplam Güç [Watt]</label>
            <input type="number" id="hc-fc-p" value="2000">
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-v">Gerilim [Volt]</label>
            <input type="number" id="hc-fc-v" value="230">
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-sf">Emniyet Katsayısı</label>
            <input type="number" id="hc-fc-sf" value="1.25" step="0.05">
            <small>Genelde 1.25 ( %25 yedek) kullanılır.</small>
        </div>
        <button class="hc-btn" onclick="hcFuseCapacityHesapla()">Sigortayı Hesapla</button>
        <div class="hc-result" id="hc-fuse-capacity-result">
            <div class="hc-result-item">
                <span>Gereken Akım:</span>
                <span class="hc-result-value" id="hc-res-fc-val">0 A</span>
            </div>
            <p class="hc-fc-note">Not: En yakın standart üst sigorta değerini seçiniz.</p>
        </div>
    </div>
    <?php
}
