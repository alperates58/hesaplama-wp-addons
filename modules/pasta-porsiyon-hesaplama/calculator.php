<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pasta_porsiyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cake-portions',
        HC_PLUGIN_URL . 'modules/pasta-porsiyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cake-portion-calc">
        <h3>Pasta Porsiyon Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-portion-shape">Pasta Şekli:</label>
            <select id="hc-portion-shape">
                <option value="round">Yuvarlak</option>
                <option value="square">Kare</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-portion-size">Pasta Çapı / Kenarı (cm):</label>
            <input type="number" id="hc-portion-size" placeholder="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-portion-height">Pasta Yüksekliği:</label>
            <select id="hc-portion-height">
                <option value="1">Standart (7-10 cm)</option>
                <option value="1.5">Yüksek / Katlı (>12 cm)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCakePortionHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cake-portion-result">
            <strong>Tahmini Porsiyon:</strong>
            <div id="hc-portion-val" class="hc-result-value">-</div>
            <p id="hc-portion-info"></p>
        </div>
    </div>
    <?php
}
