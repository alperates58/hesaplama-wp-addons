<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_odak_uzakligi_esdegeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-odak-uzakligi-esdegeri-hesaplama',
        HC_PLUGIN_URL . 'modules/odak-uzakligi-esdegeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-odak-uzakligi-esdegeri-hesaplama-css',
        HC_PLUGIN_URL . 'modules/odak-uzakligi-esdegeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-odak-uzakligi-esdegeri-hesaplama">
        <h3>Odak Uzaklığı Eşdeğeri Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-eqf-focal">Gerçek Odak Uzaklığı (mm)</label>
            <input type="number" id="hc-eqf-focal" class="hc-input" placeholder="Örn: 50" value="50" min="1" step="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-eqf-sensor">Sensör Formatı / Çarpanı</label>
            <select id="hc-eqf-sensor" class="hc-select" onchange="hcOdakUzakligiEsdegeriGuncelle()">
                <option value="1.0">Full Frame (1.0x)</option>
                <option value="1.3">APS-H (1.3x)</option>
                <option value="1.5" selected>APS-C (Nikon/Sony/Fuji 1.5x)</option>
                <option value="1.6">APS-C (Canon 1.6x)</option>
                <option value="2.0">Micro Four Thirds (2.0x)</option>
                <option value="2.7">1" Sensör (2.7x)</option>
                <option value="0.79">Orta Format (0.79x)</option>
                <option value="custom">Özel Çarpan...</option>
            </select>
        </div>
        
        <div class="hc-form-group" id="hc-eqf-custom-group" style="display: none;">
            <label for="hc-eqf-crop">Özel Kırpma Çarpanı (Crop Factor)</label>
            <input type="number" id="hc-eqf-crop" class="hc-input" placeholder="Örn: 1.5" value="1.5" min="0.1" max="10" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcOdakUzakligiEsdegeriHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-odak-uzakligi-esdegeri-hesaplama-result">
            <div class="hc-result-item">
                <span>Kullanılan Çarpan:</span>
                <strong id="hc-eqf-factor-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>35mm Eşdeğer Odak Uzaklığı:</span>
                <span class="hc-result-value" id="hc-eqf-result-val">-</span>
            </div>
        </div>
    </div>
    <?php
}
