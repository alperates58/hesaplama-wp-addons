<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gorus_acisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gorus-acisi-hesaplama',
        HC_PLUGIN_URL . 'modules/gorus-acisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gorus-acisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gorus-acisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gorus-acisi-hesaplama">
        <h3>Görüş Açısı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-aov-focal">Odak Uzaklığı (mm)</label>
            <input type="number" id="hc-aov-focal" class="hc-input" placeholder="Örn: 50" value="50" min="1" step="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-aov-sensor">Sensör Boyutu</label>
            <select id="hc-aov-sensor" class="hc-select" onchange="hcGorusAcisiSensorGuncelle()">
                <option value="36,24" selected>Full Frame (36 x 24 mm)</option>
                <option value="23.6,15.6">APS-C (Nikon/Sony/Fuji 1.5x) (23.6 x 15.6 mm)</option>
                <option value="22.2,14.8">APS-C (Canon 1.6x) (22.2 x 14.8 mm)</option>
                <option value="17.3,13.0">Micro Four Thirds (17.3 x 13 mm)</option>
                <option value="13.2,8.8">1" Sensör (13.2 x 8.8 mm)</option>
                <option value="custom">Özel Boyut...</option>
            </select>
        </div>
        
        <div class="hc-form-group" id="hc-aov-custom-w-group" style="display: none;">
            <label for="hc-aov-custom-w">Özel Sensör Genişliği (mm)</label>
            <input type="number" id="hc-aov-custom-w" class="hc-input" placeholder="Genişlik" value="36" min="1" step="0.1">
        </div>
        
        <div class="hc-form-group" id="hc-aov-custom-h-group" style="display: none;">
            <label for="hc-aov-custom-h">Özel Sensör Yüksekliği (mm)</label>
            <input type="number" id="hc-aov-custom-h" class="hc-input" placeholder="Yükseklik" value="24" min="1" step="0.1">
        </div>

        <button class="hc-btn" onclick="hcGorusAcisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gorus-acisi-hesaplama-result">
            <div class="hc-result-item">
                <span>Yatay Görüş Açısı (Horizontal AoV):</span>
                <strong id="hc-aov-horiz-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Dikey Görüş Açısı (Vertical AoV):</span>
                <strong id="hc-aov-vert-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Köşegen Görüş Açısı (Diagonal AoV):</span>
                <span class="hc-result-value" id="hc-aov-diag-val">-</span>
            </div>
        </div>
    </div>
    <?php
}
