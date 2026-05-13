<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tropikal_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-tropikal',
        HC_PLUGIN_URL . 'modules/tropikal-burc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-tropikal-css',
        HC_PLUGIN_URL . 'modules/tropikal-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-tropikal">
        <div class="hc-header">
            <h3>Tropikal Burç Hesaplama</h3>
            <p>Tropikal Zodyak, Bahar Ekinoksu'nu (21 Mart) Koç burcunun 0 derecesi kabul eden, mevsimsel bir sistemdir.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-tb-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-tb-birthdate" class="hc-input" required>
        </div>

        <button class="hc-btn" onclick="hcTropikalBurcHesapla()">Tropikal Burcumu Bul</button>

        <div class="hc-result" id="hc-tb-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Tropikal Burcunuz:</span>
                <span class="hc-result-value" id="hc-tb-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-tb-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
