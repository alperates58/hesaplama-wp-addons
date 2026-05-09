<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bulgur_su_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bulgur-water',
        HC_PLUGIN_URL . 'modules/bulgur-su-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bulgur-water-css',
        HC_PLUGIN_URL . 'modules/bulgur-su-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bulgur-water">
        <h3>Bulgur Su Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-bw-type">Bulgur Türü</label>
            <select id="hc-bw-type">
                <option value="pilavlik">Pilavlık Bulgur</option>
                <option value="basbasi">Başbaşı (İri) Bulgur</option>
                <option value="koftelik">Köftelik (İnce) Bulgur</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-bw-amount">Bulgur Miktarı (Su Bardağı)</label>
            <input type="number" id="hc-bw-amount" value="1" step="0.5" min="0.5">
        </div>
        <button class="hc-btn" onclick="hcBulgurWaterHesapla()">Su Ölçüsünü Gör</button>
        <div class="hc-result" id="hc-bulgur-water-result">
            <div class="hc-result-item">
                <span>Gereken Su:</span>
                <span class="hc-result-value" id="hc-res-bw-water">0 Bardak</span>
            </div>
            <p class="hc-bw-info">Sıcak su kullanılması ve kısık ateşte pişirilmesi önerilir.</p>
        </div>
    </div>
    <?php
}
