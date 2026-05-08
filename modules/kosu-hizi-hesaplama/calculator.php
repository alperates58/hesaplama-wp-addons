<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kosu_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-run-speed',
        HC_PLUGIN_URL . 'modules/kosu-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-speed-box">
        <h3>Koşu Hızı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-rs-dist">Mesafe (km)</label>
            <input type="number" id="hc-rs-dist" step="0.1" placeholder="Örn: 5">
        </div>

        <div class="hc-form-group" style="display: flex; gap: 10px;">
            <div style="flex: 1;">
                <label for="hc-rs-h">Saat</label>
                <input type="number" id="hc-rs-h" value="0">
            </div>
            <div style="flex: 1;">
                <label for="hc-rs-m">Dakika</label>
                <input type="number" id="hc-rs-m" value="30">
            </div>
            <div style="flex: 1;">
                <label for="hc-rs-s">Saniye</label>
                <input type="number" id="hc-rs-s" value="0">
            </div>
        </div>

        <button class="hc-btn" onclick="hcKoşuHızıHesapla()">Hızı Hesapla</button>

        <div class="hc-result" id="hc-run-speed-result">
            <div class="hc-result-item">
                <span>Ortalama Hız:</span>
                <div class="hc-result-value" id="hc-rs-value">-</div>
            </div>
            <div class="hc-result-item">
                <span>Tempo (Pace):</span>
                <strong id="hc-rs-pace">-</strong>
            </div>
        </div>
    </div>
    <?php
}
