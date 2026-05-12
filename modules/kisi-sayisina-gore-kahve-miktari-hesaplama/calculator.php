<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_kahve_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coffee-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-kahve-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-coffee-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-kahve-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-coffee-per-person">
        <h3>Kahve Miktarı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cpp-count">Kişi Sayısı</label>
            <input type="number" id="hc-cpp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-cpp-type">Kahve Türü</label>
            <select id="hc-cpp-type">
                <option value="7|65">Türk Kahvesi (7g Kahve / 65ml Su)</option>
                <option value="15|250">Filtre Kahve (15g Kahve / 250ml Su)</option>
                <option value="18|60">Espresso - Double (18g Kahve / 60ml Su)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcKahveMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-coffee-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Kahve:</span>
                <strong id="hc-cpp-res-coffee">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gereken Su:</span>
                <strong id="hc-cpp-res-water">-</strong>
            </div>
        </div>
    </div>
    <?php
}
