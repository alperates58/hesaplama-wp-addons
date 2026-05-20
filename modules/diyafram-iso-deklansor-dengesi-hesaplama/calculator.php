<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_diyafram_iso_deklansor_dengesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-diyafram-iso-deklansor-dengesi-hesaplama',
        HC_PLUGIN_URL . 'modules/diyafram-iso-deklansor-dengesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-diyafram-iso-deklansor-dengesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/diyafram-iso-deklansor-dengesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-diyafram-iso-deklansor-dengesi-hesaplama">
        <h3>Diyafram ISO Deklanşör Dengesi Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-exp-aperture">Diyafram (f/stop)</label>
            <select id="hc-exp-aperture" class="hc-select">
                <option value="1.4">f/1.4</option>
                <option value="1.8">f/1.8</option>
                <option value="2.0">f/2.0</option>
                <option value="2.8">f/2.8</option>
                <option value="4.0">f/4</option>
                <option value="5.6" selected>f/5.6</option>
                <option value="8.0">f/8</option>
                <option value="11.0">f/11</option>
                <option value="16.0">f/16</option>
                <option value="22.0">f/22</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-exp-iso">ISO Değeri</label>
            <select id="hc-exp-iso" class="hc-select">
                <option value="50">ISO 50</option>
                <option value="100" selected>ISO 100</option>
                <option value="200">ISO 200</option>
                <option value="400">ISO 400</option>
                <option value="800">ISO 800</option>
                <option value="1600">ISO 1600</option>
                <option value="3200">ISO 3200</option>
                <option value="6400">ISO 6400</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-exp-shutter">Deklanşör Süresi (saniye)</label>
            <input type="number" id="hc-exp-shutter" class="hc-input" placeholder="Örn: 0.005" value="0.005" min="0.0001" step="0.0001">
        </div>

        <button class="hc-btn" onclick="hcDiyaframIsoDeklansorDengesiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-diyafram-iso-deklansor-dengesi-hesaplama-result">
            <div class="hc-result-item">
                <span>EV (Exposure Value):</span>
                <strong id="hc-exp-ev-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Alternatif Kombinasyonlar:</span>
            </div>
            <div id="hc-exp-combinations-val" style="padding-left: 20px;">-</div>
        </div>
    </div>
    <?php
}
