<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kosu_tempo_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-run-pace',
        HC_PLUGIN_URL . 'modules/kosu-tempo-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pace-box">
        <h3>Koşu Tempo (Pace) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-rp-dist">Mesafe (km)</label>
            <input type="number" id="hc-rp-dist" step="0.1" placeholder="Örn: 10">
        </div>

        <div class="hc-form-group" style="display: flex; gap: 10px;">
            <div style="flex: 1;">
                <label for="hc-rp-h">Saat</label>
                <input type="number" id="hc-rp-h" value="0">
            </div>
            <div style="flex: 1;">
                <label for="hc-rp-m">Dakika</label>
                <input type="number" id="hc-rp-m" value="0">
            </div>
            <div style="flex: 1;">
                <label for="hc-rp-s">Saniye</label>
                <input type="number" id="hc-rp-s" value="0">
            </div>
        </div>

        <button class="hc-btn" onclick="hcKoşuTempoHesapla()">Tempoyu Hesapla</button>

        <div class="hc-result" id="hc-run-pace-result">
            <div class="hc-result-item">
                <span>Ortalama Tempo:</span>
                <div class="hc-result-value" id="hc-rp-value">-</div>
            </div>
            <div class="hc-result-item">
                <span>Saatlik Hız:</span>
                <strong id="hc-rp-speed">-</strong>
            </div>
        </div>
    </div>
    <?php
}
