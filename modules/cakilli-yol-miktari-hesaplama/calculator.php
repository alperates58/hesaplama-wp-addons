<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cakilli_yol_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cakilli-yol-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/cakilli-yol-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cakilli-yol-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cakilli-yol-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cakilli-yol-miktari-hesaplama">
        <h3>Çakıl / Mıcır Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cym-length">Alan Uzunluğu (m)</label>
            <input type="number" id="hc-cym-length" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-cym-width">Alan Genişliği (m)</label>
            <input type="number" id="hc-cym-width" placeholder="Örn: 3">
        </div>
        <div class="hc-form-group">
            <label for="hc-cym-depth">Serim Derinliği (cm)</label>
            <input type="number" id="hc-cym-depth" placeholder="Örn: 10" value="10">
        </div>
        <button class="hc-btn" onclick="hcCYMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cym-result">
            <div class="hc-cym-grid">
                <div class="hc-cym-item">
                    <span class="hc-result-label">Gereken Ağırlık:</span>
                    <span class="hc-result-value" id="hc-cym-weight">-</span>
                </div>
                <div class="hc-cym-item">
                    <span class="hc-result-label">Gereken Hacim:</span>
                    <span class="hc-result-value" id="hc-cym-vol">-</span>
                </div>
            </div>
            <div class="hc-result-note">Mıcır yoğunluğu 1.6 t/m³ baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
