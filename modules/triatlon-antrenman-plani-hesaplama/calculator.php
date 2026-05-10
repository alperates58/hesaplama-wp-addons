<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_triatlon_antrenman_plani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tri-plan',
        HC_PLUGIN_URL . 'modules/triatlon-antrenman-plani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tri-plan-css',
        HC_PLUGIN_URL . 'modules/triatlon-antrenman-plani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tri-plan">
        <h3>Haftalık Triatlon Antrenman Hacmi</h3>
        <div class="hc-form-group">
            <label for="hc-tp-type">Hedef Yarış Mesafesi:</label>
            <select id="hc-tp-type">
                <option value="sprint">Sprint (750m / 20km / 5km)</option>
                <option value="olympic">Olimpik (1.5km / 40km / 10km)</option>
                <option value="half">Half Ironman (1.9km / 90km / 21.1km)</option>
                <option value="full">Ironman (3.8km / 180km / 42.2km)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTriPlanHesapla()">Planı Oluştur</button>
        <div class="hc-result" id="hc-tri-plan-result">
            <table class="hc-plan-table">
                <thead>
                    <tr><th>Branş</th><th>Haftalık Hedef</th></tr>
                </thead>
                <tbody id="hc-tp-tbody"></tbody>
            </table>
        </div>
    </div>
    <?php
}
