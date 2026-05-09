<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_masa_ortusu_metraji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tablecloth-meter',
        HC_PLUGIN_URL . 'modules/masa-ortusu-metraji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tablecloth-meter-css',
        HC_PLUGIN_URL . 'modules/masa-ortusu-metraji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tablecloth-meter">
        <h3>Masa Örtüsü Metrajı</h3>
        <div class="hc-form-group">
            <label for="hc-tc-width">Gereken Örtü Eni (cm)</label>
            <input type="number" id="hc-tc-width" placeholder="Örn: 140">
        </div>
        <div class="hc-form-group">
            <label for="hc-tc-len">Gereken Örtü Boyu (cm)</label>
            <input type="number" id="hc-tc-len" placeholder="Örn: 200">
        </div>
        <div class="hc-form-group">
            <label for="hc-tc-roll">Kumaş Eni (cm)</label>
            <select id="hc-tc-roll">
                <option value="140">140 cm (Standart)</option>
                <option value="160">160 cm</option>
                <option value="180">180 cm</option>
                <option value="240">240 cm</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTableclothMeterHesapla()">Metraj Hesapla</button>
        <div class="hc-result" id="hc-tablecloth-meter-result">
            <div class="hc-result-item">
                <span>Gereken Metraj:</span>
                <span class="hc-result-value" id="hc-res-tc-meter">0 Metre</span>
            </div>
            <p class="hc-tc-info">Not: Örtü eni kumaş eninden küçükse sadece boyunu almanız yeterlidir.</p>
        </div>
    </div>
    <?php
}
