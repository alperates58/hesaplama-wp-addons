<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ohm_kanunu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ohm-kanunu',
        HC_PLUGIN_URL . 'modules/ohm-kanunu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ohm-kanunu">
        <h3>Ohm Kanunu Hesaplama</h3>
        <p class="hc-desc">Hesaplamak istediğiniz alanı boş bırakın, diğer iki değeri girin.</p>
        
        <div class="hc-form-group">
            <label for="hc-ok-v">Gerilim (Volt - V)</label>
            <input type="number" id="hc-ok-v" placeholder="V" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-ok-i">Akım (Amper - A)</label>
            <input type="number" id="hc-ok-i" placeholder="A" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-ok-r">Direnç (Ohm - Ω)</label>
            <input type="number" id="hc-ok-r" placeholder="Ω" step="any">
        </div>

        <button class="hc-btn" onclick="hcOkHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ok-result">
            <div id="hc-ok-summary" style="font-weight:600; font-size:1.1rem; text-align:center;"></div>
        </div>
    </div>
    <?php
}
