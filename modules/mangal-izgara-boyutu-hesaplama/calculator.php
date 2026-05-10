<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mangal_izgara_boyutu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-grill-size',
        HC_PLUGIN_URL . 'modules/mangal-izgara-boyutu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-grill-size-calc">
        <h3>Mangal Izgara Boyutu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-grill-count">Kişi Sayısı:</label>
            <input type="number" id="hc-grill-count" placeholder="6">
        </div>
        <div class="hc-form-group">
            <label for="hc-grill-type">Yemek Türü:</label>
            <select id="hc-grill-type">
                <option value="200">Karışık Izgara (Normal)</option>
                <option value="300">Büyük Parça Etler (Steak)</option>
                <option value="150">Köfte / Sucuk</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcGrillSizeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-grill-size-result">
            <strong>Gereken Izgara Alanı:</strong>
            <div id="hc-grill-val" class="hc-result-value">-</div>
            <p id="hc-grill-info"></p>
        </div>
    </div>
    <?php
}
