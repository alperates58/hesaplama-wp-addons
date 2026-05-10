<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kano_kurek_boyu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kayak-paddle',
        HC_PLUGIN_URL . 'modules/kano-kurek-boyu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kayak-paddle-css',
        HC_PLUGIN_URL . 'modules/kano-kurek-boyu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kayak-paddle">
        <h3>Kano Kürek Boyu Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-kp-height">Boyunuz (cm):</label>
            <input type="number" id="hc-kp-height" placeholder="175">
        </div>
        <div class="hc-form-group">
            <label for="hc-kp-type">Kano / Kayak Tipi:</label>
            <select id="hc-kp-type">
                <option value="recreational">Gezi / Hobi (Geniş)</option>
                <option value="touring">Tur / Deniz (Dar)</option>
                <option value="whitewater">Akarsu / Whitewater</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKayakPaddleHesapla()">Boyutu Hesapla</button>
        <div class="hc-result" id="hc-kayak-paddle-result">
            <strong>Önerilen Kürek Boyu:</strong>
            <div id="hc-kp-res-val" class="hc-result-value">-</div>
            <span>Santimetre (cm)</span>
        </div>
    </div>
    <?php
}
