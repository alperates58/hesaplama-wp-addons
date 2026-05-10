<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_egilme_gerilmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bending-stress',
        HC_PLUGIN_URL . 'modules/egilme-gerilmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bending-stress-css',
        HC_PLUGIN_URL . 'modules/egilme-gerilmesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stress">
        <h3>Eğilme Gerilmesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bs-moment">Eğilme Momenti (M - Nm):</label>
            <input type="number" id="hc-bs-moment" placeholder="5000">
        </div>
        <div class="hc-form-group">
            <label for="hc-bs-inertia">Atalet Momenti (I - mm⁴):</label>
            <input type="number" id="hc-bs-inertia" placeholder="1000000">
        </div>
        <div class="hc-form-group">
            <label for="hc-bs-dist">Tarafsız Eksene Uzaklık (y - mm):</label>
            <input type="number" id="hc-bs-dist" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcBendingStressHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-stress-result">
            <strong>Maksimum Gerilme:</strong>
            <div id="hc-bs-res-val" class="hc-result-value">-</div>
            <span>MPa (N/mm²)</span>
        </div>
    </div>
    <?php
}
