<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_boru_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boru-agirligi-hesaplama',
        HC_PLUGIN_URL . 'modules/boru-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-boru-agirligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/boru-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-boru-agirligi-hesaplama">
        <h3>Boru Ağırlığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ba-mat">Malzeme</label>
            <select id="hc-ba-mat">
                <option value="7.85">Çelik (7.85 g/cm³)</option>
                <option value="8.96">Bakır (8.96 g/cm³)</option>
                <option value="2.70">Alüminyum (2.70 g/cm³)</option>
                <option value="1.40">PVC (1.40 g/cm³)</option>
                <option value="0.95">HDPE (0.95 g/cm³)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ba-od">Dış Çap (mm)</label>
            <input type="number" id="hc-ba-od" placeholder="Örn: 60">
        </div>
        <div class="hc-form-group">
            <label for="hc-ba-wt">Et Kalınlığı (mm)</label>
            <input type="number" id="hc-ba-wt" placeholder="Örn: 4">
        </div>
        <div class="hc-form-group">
            <label for="hc-ba-len">Boru Uzunluğu (m)</label>
            <input type="number" id="hc-ba-len" placeholder="Örn: 6" value="1">
        </div>
        <button class="hc-btn" onclick="hcBAHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ba-result">
            <div class="hc-result-label">Toplam Ağırlık:</div>
            <div class="hc-result-value" id="hc-ba-val">-</div>
            <div class="hc-result-note">Ağırlık = π * (OD - WT) * WT * Yoğunluk * L</div>
        </div>
    </div>
    <?php
}
