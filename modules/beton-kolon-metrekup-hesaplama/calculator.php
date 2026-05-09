<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beton_kolon_metrekup_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beton-kolon-metrekup-hesaplama',
        HC_PLUGIN_URL . 'modules/beton-kolon-metrekup-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beton-kolon-metrekup-hesaplama-css',
        HC_PLUGIN_URL . 'modules/beton-kolon-metrekup-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beton-kolon-metrekup-hesaplama">
        <h3>Beton Kolon Hacim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bkm-shape">Kolon Kesit Tipi</label>
            <select id="hc-bkm-shape" onchange="hcBKMToggle()">
                <option value="rect">Kare / Dikdörtgen</option>
                <option value="circle">Daire / Silindir</option>
            </select>
        </div>
        <div id="hc-bkm-rect">
            <div class="hc-form-group">
                <label for="hc-bkm-a">Kenar A (cm)</label>
                <input type="number" id="hc-bkm-a" placeholder="Örn: 40">
            </div>
            <div class="hc-form-group">
                <label for="hc-bkm-b">Kenar B (cm)</label>
                <input type="number" id="hc-bkm-b" placeholder="Örn: 40">
            </div>
        </div>
        <div id="hc-bkm-circle" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-bkm-d">Çap (cm)</label>
                <input type="number" id="hc-bkm-d" placeholder="Örn: 50">
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-bkm-h">Yükseklik (m)</label>
            <input type="number" id="hc-bkm-h" placeholder="Örn: 3" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bkm-count">Kolon Sayısı</label>
            <input type="number" id="hc-bkm-count" value="1">
        </div>
        <button class="hc-btn" onclick="hcBKMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bkm-result">
            <div class="hc-result-label">Toplam Beton Hacmi:</div>
            <div class="hc-result-value" id="hc-bkm-val">-</div>
            <div class="hc-result-note">Maliyet ve lojistik için yaklaşık değerdir.</div>
        </div>
    </div>
    <?php
}
