<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_borek_porsiyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-borek-portion',
        HC_PLUGIN_URL . 'modules/borek-porsiyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-borek-portion-css',
        HC_PLUGIN_URL . 'modules/borek-porsiyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-borek-portion">
        <h3>Börek Porsiyon Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-bp-tray">Tepsi Boyutu</label>
            <select id="hc-bp-tray">
                <option value="std_rect">Standart Dikdörtgen (40x60 cm)</option>
                <option value="std_round">Standart Yuvarlak (40 cm)</option>
                <option value="home_rect">Ev Tipi (30x40 cm)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBorekPortionHesapla()">Porsiyonları Hesapla</button>
        <div class="hc-result" id="hc-borek-portion-result">
            <div class="hc-result-item">
                <span>Tahmini Porsiyon:</span>
                <span class="hc-result-value" id="hc-res-bp-count">0 Kişilik</span>
            </div>
            <p class="hc-bp-note">Doyurucu bir ana öğün porsiyonu baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
