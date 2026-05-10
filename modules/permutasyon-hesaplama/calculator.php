<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_permutasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-perm',
        HC_PLUGIN_URL . 'modules/permutasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-perm">
        <h3>Permütasyon P(n, r)</h3>
        <div class="hc-form-group">
            <label for="hc-p-n">n (Eleman Sayısı):</label>
            <input type="number" id="hc-p-n" min="0" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-p-r">r (Seçim Sayısı):</label>
            <input type="number" id="hc-p-r" min="0" placeholder="3">
        </div>
        <button class="hc-btn" onclick="hcPermHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-perm-result">
            <strong>Sonuç:</strong>
            <div id="hc-p-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
