<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alan_derinligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alan-derinligi-hesaplama',
        HC_PLUGIN_URL . 'modules/alan-derinligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alan-derinligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/alan-derinligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alan-derinligi-hesaplama">
        <h3>Alan Derinliği Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-dof-sensor">Sensör Tipi / Kırpma Çarpanı</label>
            <select id="hc-dof-sensor" class="hc-select" onchange="hcAlanDerinligiGuncelleCoC()">
                <option value="0.030">35mm Full Frame (CoC: 0.030 mm)</option>
                <option value="0.020">APS-C (Canon 1.6x) (CoC: 0.019 mm)</option>
                <option value="0.020" selected>APS-C (Nikon/Sony/Fuji 1.5x) (CoC: 0.020 mm)</option>
                <option value="0.015">Micro Four Thirds (2.0x) (CoC: 0.015 mm)</option>
                <option value="0.011">1" Sensör (CoC: 0.011 mm)</option>
                <option value="0.005">Orta Format (CoC: 0.005 mm)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-dof-focal">Odak Uzaklığı (mm)</label>
            <input type="number" id="hc-dof-focal" class="hc-input" placeholder="Örn: 50" value="50" min="1" step="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-dof-aperture">Diyafram (f/stop)</label>
            <select id="hc-dof-aperture" class="hc-select">
                <option value="1.2">f/1.2</option>
                <option value="1.4" selected>f/1.4</option>
                <option value="1.8">f/1.8</option>
                <option value="2.0">f/2.0</option>
                <option value="2.8">f/2.8</option>
                <option value="4.0">f/4</option>
                <option value="5.6">f/5.6</option>
                <option value="8.0">f/8</option>
                <option value="11.0">f/11</option>
                <option value="16.0">f/16</option>
                <option value="22.0">f/22</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-dof-distance">Konu Mesafesi (metre)</label>
            <input type="number" id="hc-dof-distance" class="hc-input" placeholder="Örn: 3" value="3" min="0.1" step="0.1">
        </div>

        <button class="hc-btn" onclick="hcAlanDerinligiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-alan-derinligi-hesaplama-result">
            <div class="hc-result-item">
                <span>Yakın Netlik Sınırı:</span>
                <strong id="hc-dof-near-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Uzak Netlik Sınırı:</span>
                <strong id="hc-dof-far-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Alan Derinliği (DoF):</span>
                <span class="hc-result-value" id="hc-dof-total-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>Hiperfokal Mesafe:</span>
                <strong id="hc-dof-hyper-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
