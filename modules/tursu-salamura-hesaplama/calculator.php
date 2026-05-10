<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tursu_salamura_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pickle-brine',
        HC_PLUGIN_URL . 'modules/tursu-salamura-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pickle-brine-calc">
        <h3>Turşu Salamura Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-pb-water">Kullanılacak Su (Litre):</label>
            <input type="number" id="hc-pb-water" placeholder="1" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcPickleBrineHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pickle-brine-result">
            <strong>Gereken Malzemeler:</strong>
            <div id="hc-pb-res-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
