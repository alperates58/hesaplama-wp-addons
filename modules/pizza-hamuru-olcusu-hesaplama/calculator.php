<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pizza_hamuru_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pizza-dough-size-js',
        HC_PLUGIN_URL . 'modules/pizza-hamuru-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pizza-dough-size-css',
        HC_PLUGIN_URL . 'modules/pizza-hamuru-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pizza-dough-size">
        <h3>Pizza Hamuru Ölçüsü</h3>
        
        <div class="hc-form-group">
            <label for="hc-pds-diameter">Pizza Çapı (cm)</label>
            <input type="number" id="hc-pds-diameter" value="30" min="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-pds-thick">Hamur Kalınlığı</label>
            <select id="hc-pds-thick">
                <option value="0.4">İnce (Napolitan - 0.40g/cm²)</option>
                <option value="0.5">Orta (Standart - 0.50g/cm²)</option>
                <option value="0.75">Kalın (Tava - 0.75g/cm²)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcPizzaHamurHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pizza-dough-size-result">
            <div class="hc-result-item">
                <span>Gereken Hamur Ağırlığı:</span>
                <strong class="hc-result-value" id="hc-pds-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama, tek bir pizza hamuru topunun ideal ağırlığını gösterir.</div>
        </div>
    </div>
    <?php
}
