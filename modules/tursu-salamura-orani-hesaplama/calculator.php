<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tursu_salamura_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pickle-ratio-js',
        HC_PLUGIN_URL . 'modules/tursu-salamura-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pickle-ratio-css',
        HC_PLUGIN_URL . 'modules/tursu-salamura-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pickle-ratio">
        <h3>Turşu Salamura Hesaplayıcı</h3>
        
        <div class="hc-form-group">
            <label for="hc-pr-water">Kullanılacak Su (Litre)</label>
            <input type="number" id="hc-pr-water" value="1" min="0.1" step="0.5">
        </div>

        <button class="hc-btn" onclick="hcTursuOraniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pickle-ratio-result">
            <div id="hc-pr-res-list">
                <!-- JS populated -->
            </div>
            <div class="hc-result-note">
                <strong>Püf Noktası:</strong> Salamura suyunun sebzelerin üzerini tamamen kapatması gerekir. Kaya tuzu kullanılması erimeyi önler.
            </div>
        </div>
    </div>
    <?php
}
