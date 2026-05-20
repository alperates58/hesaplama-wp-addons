<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hiperfocal_mesafe_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hiperfocal-mesafe-hesaplama',
        HC_PLUGIN_URL . 'modules/hiperfocal-mesafe-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hiperfocal-mesafe-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hiperfocal-mesafe-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hiperfocal-mesafe-hesaplama">
        <h3>Hiperfocal Mesafe Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hfd-sensor">Sensör Tipi / CoC Değeri</label>
            <select id="hc-hfd-sensor" class="hc-select" onchange="hcHiperfocalCoCGuncelle()">
                <option value="0.030">35mm Full Frame (CoC: 0.030 mm)</option>
                <option value="0.020" selected>APS-C (Nikon/Sony/Fuji 1.5x) (CoC: 0.020 mm)</option>
                <option value="0.019">APS-C (Canon 1.6x) (CoC: 0.019 mm)</option>
                <option value="0.015">Micro Four Thirds (2.0x) (CoC: 0.015 mm)</option>
                <option value="0.011">1" Sensör (CoC: 0.011 mm)</option>
                <option value="custom">Özel CoC (mm)...</option>
            </select>
        </div>
        
        <div class="hc-form-group" id="hc-hfd-custom-coc-group" style="display: none;">
            <label for="hc-hfd-custom-coc">Bulanıklık Dairesi Çapı (Circle of Confusion - mm)</label>
            <input type="number" id="hc-hfd-custom-coc" class="hc-input" placeholder="Örn: 0.02" value="0.020" min="0.001" max="0.1" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hfd-focal">Odak Uzaklığı (mm)</label>
            <input type="number" id="hc-hfd-focal" class="hc-input" placeholder="Örn: 35" value="35" min="1" step="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hfd-aperture">Diyafram (f/stop)</label>
            <select id="hc-hfd-aperture" class="hc-select">
                <option value="1.4">f/1.4</option>
                <option value="2.0">f/2.0</option>
                <option value="2.8">f/2.8</option>
                <option value="4.0">f/4</option>
                <option value="5.6">f/5.6</option>
                <option value="8.0" selected>f/8</option>
                <option value="11.0">f/11</option>
                <option value="16.0">f/16</option>
                <option value="22.0">f/22</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcHiperfocalHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hiperfocal-mesafe-hesaplama-result">
            <div class="hc-result-item">
                <span>Circle of Confusion (CoC):</span>
                <strong id="hc-hfd-coc-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Yaklaşık Formül (f² / N·c):</span>
                <strong id="hc-hfd-approx-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kesin Formül (f² / N·c + f):</span>
                <span class="hc-result-value" id="hc-hfd-exact-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>Netlik Başlangıç Sınırı (H / 2):</span>
                <strong id="hc-hfd-near-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
