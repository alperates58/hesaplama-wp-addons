<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sorf_tahtasi_hacim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-surf-vol',
        HC_PLUGIN_URL . 'modules/sorf-tahtasi-hacim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-surf-vol-css',
        HC_PLUGIN_URL . 'modules/sorf-tahtasi-hacim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-surf-vol">
        <h3>Sörf Tahtası Hacim (Liter) Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-sv-weight">Vücut Ağırlığınız (kg):</label>
            <input type="number" id="hc-sv-weight" placeholder="75">
        </div>
        <div class="hc-form-group">
            <label for="hc-sv-level">Deneyim Seviyeniz:</label>
            <select id="hc-sv-level">
                <option value="1.0">Başlangıç (Bol Hacim)</option>
                <option value="0.7">Orta Seviye</option>
                <option value="0.4">İleri Seviye (Shortboard)</option>
                <option value="0.35">Pro / Elite</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSurfVolHesapla()">Hacmi Hesapla</button>
        <div class="hc-result" id="hc-surf-vol-result">
            <strong>Önerilen Hacim:</strong>
            <div id="hc-sv-res-val" class="hc-result-value">-</div>
            <span>Litre (L)</span>
        </div>
    </div>
    <?php
}
