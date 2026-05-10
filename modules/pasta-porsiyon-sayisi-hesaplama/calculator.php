<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pasta_porsiyon_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cake-size-needed',
        HC_PLUGIN_URL . 'modules/pasta-porsiyon-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cake-size-calc">
        <h3>Kaç Kişilik Pasta Lazım?</h3>
        <div class="hc-form-group">
            <label for="hc-cs-count">Davetli Sayısı:</label>
            <input type="number" id="hc-cs-count" placeholder="20">
        </div>
        <button class="hc-btn" onclick="hcCakeSizeNeededHesapla()">Boyutu Hesapla</button>
        <div class="hc-result" id="hc-cake-size-result">
            <strong>Önerilen Pasta Boyutları:</strong>
            <div id="hc-cs-val" class="hc-result-value">-</div>
            <p id="hc-cs-info"></p>
        </div>
    </div>
    <?php
}
