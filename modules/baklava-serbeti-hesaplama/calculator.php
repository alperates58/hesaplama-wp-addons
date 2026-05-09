<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_baklava_serbeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-baklava-syrup',
        HC_PLUGIN_URL . 'modules/baklava-serbeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-baklava-syrup-css',
        HC_PLUGIN_URL . 'modules/baklava-serbeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baklava-syrup">
        <h3>Baklava Şerbeti Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-bs-flour">Un Miktarı (kg)</label>
            <input type="number" id="hc-bs-flour" value="1" step="0.1" min="0.1">
        </div>
        <button class="hc-btn" onclick="hcBaklavaSyrupHesapla()">Şerbeti Hesapla</button>
        <div class="hc-result" id="hc-baklava-syrup-result">
            <div class="hc-result-item">
                <span>Gereken Şeker:</span>
                <span id="hc-res-bs-sugar">0 gr</span>
            </div>
            <div class="hc-result-item">
                <span>Gereken Su:</span>
                <span id="hc-res-bs-water">0 ml</span>
            </div>
            <p class="hc-bs-note">Klasik oran: 1 kg un için ~1.5 kg şerbet. Şerbet kıvamı için 3:2 şeker-su oranı kullanılmıştır.</p>
        </div>
    </div>
    <?php
}
