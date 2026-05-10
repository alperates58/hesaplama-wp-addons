<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_toplama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-addition',
        HC_PLUGIN_URL . 'modules/toplama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-add">
        <h3>Toplama İşlemi</h3>
        <div class="hc-form-group">
            <label for="hc-a-input">Sayıları Girin (Virgül veya boşlukla):</label>
            <textarea id="hc-a-input" rows="3" placeholder="125, 450, 12.5"></textarea>
        </div>
        <button class="hc-btn" onclick="hcAdditionHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-toplama-result">
            <strong>Toplam:</strong>
            <div id="hc-a-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
