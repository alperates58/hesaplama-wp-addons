<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kronometre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kronometre-hesaplama',
        HC_PLUGIN_URL . 'modules/kronometre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kron-calc">
        <h3>Kronometre Hesaplama</h3>
        <div class="hc-result visible" style="text-align: center; margin-bottom: 20px;">
            <div class="hc-result-value" id="hc-kr-display" style="font-size: 48px; font-family: monospace;">00:00:00.00</div>
        </div>
        <div style="display: flex; gap: 10px; justify-content: center;">
            <button class="hc-btn" id="hc-kr-start" onclick="hcKronStart()">Başlat</button>
            <button class="hc-btn" id="hc-kr-lap" onclick="hcKronLap()" style="background: var(--hc-front-muted);">Tur</button>
            <button class="hc-btn" id="hc-kr-reset" onclick="hcKronReset()" style="background: #e74c3c;">Sıfırla</button>
        </div>
        <div id="hc-kr-laps" style="margin-top: 20px; max-height: 200px; overflow-y: auto; font-size: 14px;">
            <!-- Turlar buraya -->
        </div>
    </div>
    <?php
}
