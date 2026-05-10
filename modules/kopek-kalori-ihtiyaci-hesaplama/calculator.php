<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kopek_kalori_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kopek-kalori',
        HC_PLUGIN_URL . 'modules/kopek-kalori-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kopek-kalori-css',
        HC_PLUGIN_URL . 'modules/kopek-kalori-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kopek-kalori">
        <h3>Köpek Kalori İhtiyacı</h3>
        <div class="hc-form-group">
            <label for="hc-kok-weight">Kilo (kg):</label>
            <input type="number" id="hc-kok-weight" step="0.1" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-kok-status">Aktivite / Durum:</label>
            <select id="hc-kok-status">
                <option value="1.6">Kısırlaştırılmış Yetişkin</option>
                <option value="1.8">Kısırlaştırılmamış Yetişkin</option>
                <option value="1.2">Hareketsiz / Obeziteye Meyilli</option>
                <option value="2.0">Aktif / Çalışan Köpek</option>
                <option value="3.0">Yavru (Büyüme Dönemi)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKopekKaloriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kopek-kalori-result">
            <strong>Günlük Kalori İhtiyacı:</strong>
            <div id="hc-kok-res-val" class="hc-result-value">-</div>
            <span>kcal / gün</span>
        </div>
    </div>
    <?php
}
