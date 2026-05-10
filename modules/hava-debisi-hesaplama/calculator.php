<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hava_debisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-airflow-calc',
        HC_PLUGIN_URL . 'modules/hava-debisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-airflow-calc-css',
        HC_PLUGIN_URL . 'modules/hava-debisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-airflow">
        <h3>Hava Debisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-af-type">Kanal Şekli:</label>
            <select id="hc-af-type" onchange="hcAirflowSwitch()">
                <option value="rect">Dikdörtgen Kanal</option>
                <option value="round">Yuvarlak Kanal</option>
            </select>
        </div>
        <div id="hc-af-inputs"></div>
        <div class="hc-form-group">
            <label for="hc-af-vel">Hava Hızı (m/s):</label>
            <input type="number" id="hc-af-vel" step="0.1" placeholder="5.0">
        </div>
        <button class="hc-btn" onclick="hcAirflowCalcHesapla()">Debiyi Hesapla</button>
        <div class="hc-result" id="hc-airflow-result">
            <strong>Hava Debisi:</strong>
            <div id="hc-af-res-val" class="hc-result-value">-</div>
            <span>m³ / saat</span>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(typeof hcAirflowSwitch === 'function') hcAirflowSwitch();
        });
    </script>
    <?php
}
