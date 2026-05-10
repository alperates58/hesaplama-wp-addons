<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelikte_fazla_kilo_alimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-preg-excess',
        HC_PLUGIN_URL . 'modules/gebelikte-fazla-kilo-alimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-preg-excess-css',
        HC_PLUGIN_URL . 'modules/gebelikte-fazla-kilo-alimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-preg-excess">
        <h3>Gebelikte Kilo Kontrolü</h3>
        <div class="hc-form-group">
            <label for="hc-pe-week">Gebelik Haftası:</label>
            <input type="number" id="hc-pe-week" placeholder="20" min="1" max="42">
        </div>
        <div class="hc-form-group">
            <label for="hc-pe-gain">Alınan Toplam Kilo (kg):</label>
            <input type="number" id="hc-pe-gain" placeholder="8" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pe-vki">Başlangıç VKİ (Tahmini):</label>
            <select id="hc-pe-vki">
                <option value="normal">Normal (18.5 - 25)</option>
                <option value="low">Zayıf (< 18.5)</option>
                <option value="high">Kilolu (> 25)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcPregExcessHesapla()">Kontrol Et</button>
        <div class="hc-result" id="hc-preg-excess-result">
            <div id="hc-pe-res-desc" style="font-weight:bold; font-size:1.1rem;"></div>
            <p id="hc-pe-res-info" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
