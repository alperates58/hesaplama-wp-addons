<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kek_kalibi_olcu_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cake-pan-conv',
        HC_PLUGIN_URL . 'modules/kek-kalibi-olcu-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cake-pan-conv-calc">
        <h3>Kek Kalıbı Ölçü Dönüşümü</h3>
        <div class="hc-form-group">
            <label for="hc-pan-orig">Tarifteki Kalıp Çapı (cm):</label>
            <input type="number" id="hc-pan-orig" placeholder="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-pan-new">Sizin Kalıbınızın Çapı (cm):</label>
            <input type="number" id="hc-pan-new" placeholder="24">
        </div>
        <button class="hc-btn" onclick="hcCakePanConvHesapla()">Katsayıyı Hesapla</button>
        <div class="hc-result" id="hc-cake-pan-conv-result">
            <strong>Malzeme Katsayısı:</strong>
            <div id="hc-pan-factor" class="hc-result-value">-</div>
            <p id="hc-pan-desc"></p>
        </div>
    </div>
    <?php
}
