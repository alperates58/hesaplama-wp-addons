<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrikli_bisiklet_menzili_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elektrikli-bisiklet-menzili-hesaplama',
        HC_PLUGIN_URL . 'modules/elektrikli-bisiklet-menzili-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-elektrikli-bisiklet-menzili-hesaplama-css',
        HC_PLUGIN_URL . 'modules/elektrikli-bisiklet-menzili-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ebike-range">
        <h3>Elektrikli Bisiklet Menzil Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ebike-battery">Batarya Kapasitesi (Wh - Watt-saat)</label>
            <input type="number" id="hc-ebike-battery" placeholder="Örn: 500" value="500">
            <small>Wh = Volt x Ah (Örn: 36V 14Ah = 504 Wh)</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-ebike-mode">Destek Seviyesi</label>
            <select id="hc-ebike-mode">
                <option value="8">Eco (Düşük Destek)</option>
                <option value="12" selected>Normal / Tour</option>
                <option value="18">Sport / Turbo (Yüksek Destek)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ebike-weight">Sürücü Ağırlığı</label>
            <select id="hc-ebike-weight">
                <option value="0.9">Hafif (< 70 kg)</option>
                <option value="1.0" selected>Orta (70-90 kg)</option>
                <option value="1.15">Ağır (> 90 kg)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcElektrikliBisikletMenziliHesapla()">Menzili Hesapla</button>
        <div class="hc-result" id="hc-ebike-result">
            <div class="hc-result-label">Tahmini Menzil:</div>
            <div class="hc-result-value" id="hc-ebike-val">-</div>
            <div id="hc-ebike-info" style="margin-top: 10px; font-size: 0.85em; line-height: 1.4;"></div>
        </div>
    </div>
    <?php
}
