<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ohm_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ohm-yasasi',
        HC_PLUGIN_URL . 'modules/ohm-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ohm-yasasi">
        <h3>Ohm Yasası Hesaplama</h3>
        <p class="hc-desc">Hesaplamak istediğiniz alanı boş bırakın, diğer iki değeri girin.</p>
        
        <div class="hc-form-group">
            <label for="hc-ohm-v">Gerilim (Volt - V)</label>
            <input type="number" id="hc-ohm-v" placeholder="V" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-ohm-i">Akım (Amper - A)</label>
            <input type="number" id="hc-ohm-i" placeholder="A" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-ohm-r">Direnç (Ohm - Ω)</label>
            <input type="number" id="hc-ohm-r" placeholder="Ω" step="any">
        </div>

        <button class="hc-btn" onclick="hcOhmHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ohm-result">
            <div id="hc-ohm-summary" style="font-weight:600; font-size:1.1rem; text-align:center;"></div>
        </div>
    </div>
    <?php
}
