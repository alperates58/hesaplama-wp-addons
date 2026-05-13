<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_dekani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-dekan',
        HC_PLUGIN_URL . 'modules/burc-dekani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-dekan-css',
        HC_PLUGIN_URL . 'modules/burc-dekani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-dekan">
        <div class="hc-header">
            <h3>Burç Dekanı Hesaplama</h3>
            <p>Her burç 30 derecedir ve 10'ar derecelik üç bölüme (dekan) ayrılır. Her dekan, burcun genel özelliklerini farklı bir alt yöneticiyle harmanlar.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-bd-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-bd-birthdate" class="hc-input" required>
        </div>

        <button class="hc-btn" onclick="hcBurcDekanHesapla()">Dekanımı Hesapla</button>

        <div class="hc-result" id="hc-bd-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Burcunuz ve Dekanınız:</span>
                <span class="hc-result-value" id="hc-bd-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-bd-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
