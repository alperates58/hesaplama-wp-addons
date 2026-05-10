<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_hizi_hesaplama( $atts ) {
    // Bu modül kadans-hız modülüyle benzer mantıkta ama hız odaklı arayüze sahip
    wp_enqueue_script(
        'hc-bisiklet-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/bisiklet-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bisiklet-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bisiklet-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bike-speed">
        <h3>Bisiklet Hızı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-speed-cad">Kadans (RPM)</label>
            <input type="number" id="hc-speed-cad" value="80">
        </div>
        <div class="hc-form-group">
            <label for="hc-speed-ratio">Vites Oranı (Aynakol / Ruble)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-speed-front" value="52" placeholder="Ön">
                <input type="number" id="hc-speed-rear" value="11" placeholder="Arka">
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-speed-tire">Tekerlek (mm)</label>
            <input type="number" id="hc-speed-tire" value="2136">
        </div>
        <button class="hc-btn" onclick="hcBisikletHiziHesapla()">Hızı Bul</button>
        <div class="hc-result" id="hc-bike-speed-result">
            <div class="hc-result-label">Tahmini Hızınız:</div>
            <div class="hc-result-value" id="hc-bike-speed-res">-</div>
        </div>
    </div>
    <?php
}
