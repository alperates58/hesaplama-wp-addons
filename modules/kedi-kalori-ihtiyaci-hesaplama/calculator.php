<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kedi_kalori_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kedi-kalori',
        HC_PLUGIN_URL . 'modules/kedi-kalori-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kedi-kalori-css',
        HC_PLUGIN_URL . 'modules/kedi-kalori-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kedi-kalori">
        <h3>Kedi Kalori İhtiyacı</h3>
        <div class="hc-form-group">
            <label for="hc-kk-weight">Kilo (kg):</label>
            <input type="number" id="hc-kk-weight" step="0.1" placeholder="4.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-kk-status">Durum:</label>
            <select id="hc-kk-status">
                <option value="1.2">Kısırlaştırılmış Yetişkin</option>
                <option value="1.4">Kısırlaştırılmamış Yetişkin</option>
                <option value="1.0">Hareketsiz / Kilo Almaya Meyilli</option>
                <option value="0.8">Kilo Verme Hedefi</option>
                <option value="2.5">Yavru (4-8 aylık)</option>
                <option value="2.0">Yaşlı Kedi</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKediKaloriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kedi-kalori-result">
            <strong>Günlük Enerji İhtiyacı (DER):</strong>
            <div id="hc-kk-res-val" class="hc-result-value">-</div>
            <span>kcal / gün</span>
        </div>
    </div>
    <?php
}
