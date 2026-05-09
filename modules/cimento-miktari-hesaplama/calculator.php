<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cimento_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cimento-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/cimento-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cimento-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cimento-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cimento-miktari-hesaplama">
        <h3>Çimento ve Harç Malzeme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cim-vol">Beton/Harç Hacmi (m³)</label>
            <input type="number" id="hc-cim-vol" placeholder="Örn: 1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cim-ratio">Karışım Oranı (Çimento:Kum:Agrega)</label>
            <select id="hc-cim-ratio">
                <option value="350">1:2:3 (Genel Yapı - 350 kg/m³)</option>
                <option value="300">1:3:5 (Kaba Yapı - 300 kg/m³)</option>
                <option value="400">1:1.5:3 (Dayanıklı Yapı - 400 kg/m³)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCimHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cim-result">
            <div class="hc-cim-grid">
                <div class="hc-cim-item">
                    <span class="hc-result-label">Çimento (50 kg):</span>
                    <span class="hc-result-value" id="hc-cim-bags">-</span>
                </div>
                <div class="hc-cim-item">
                    <span class="hc-result-label">Kum (m³):</span>
                    <span class="hc-result-value" id="hc-cim-sand">-</span>
                </div>
                <div class="hc-cim-item">
                    <span class="hc-result-label">Agrega (m³):</span>
                    <span class="hc-result-value" id="hc-cim-gravel">-</span>
                </div>
            </div>
            <div class="hc-result-note">Hacim ve oranlar yaklaşık değerlerdir.</div>
        </div>
    </div>
    <?php
}
