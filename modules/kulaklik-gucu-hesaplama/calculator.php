<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kulaklik_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-headphone-power',
        HC_PLUGIN_URL . 'modules/kulaklik-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-headphone-power-css',
        HC_PLUGIN_URL . 'modules/kulaklik-gucu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-headphone-power">
        <h3>Kulaklık Güç İhtiyacı</h3>
        <div class="hc-form-group">
            <label for="hc-hp-sens">Hassasiyet (dB/mW)</label>
            <input type="number" id="hc-hp-sens" value="98" min="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-hp-imp">Empedans (Ohm)</label>
            <input type="number" id="hc-hp-imp" value="32" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-hp-vol">Hedef Ses Seviyesi (dB)</label>
            <input type="number" id="hc-hp-vol" value="110" min="80" max="130">
        </div>
        <button class="hc-btn" onclick="hcHeadphonePowerHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-headphone-power-result">
            <div class="hc-result-item">
                <span>Gereken Güç:</span>
                <span class="hc-result-value" id="hc-res-hp-mw">0 mW</span>
            </div>
            <div class="hc-result-item">
                <span>Gereken Gerilim:</span>
                <span id="hc-res-hp-v">0 V</span>
            </div>
            <p class="hc-hp-note">110 dB "oldukça yüksek" ve güvenli bir hedeftir.</p>
        </div>
    </div>
    <?php
}
