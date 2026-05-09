<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tuvalet_kagidi_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tp-usage',
        HC_PLUGIN_URL . 'modules/tuvalet-kagidi-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tp-usage-css',
        HC_PLUGIN_URL . 'modules/tuvalet-kagidi-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tp-usage">
        <h3>Tuvalet Kağıdı Tüketimi</h3>
        <div class="hc-form-group">
            <label for="hc-tp-people">Evdeki Kişi Sayısı</label>
            <input type="number" id="hc-tp-people" value="3" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-tp-daily">Kişi Başı Günlük Kullanım (Yaprak)</label>
            <input type="number" id="hc-tp-daily" value="20" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-tp-roll">Rulo Başına Yaprak Sayısı</label>
            <select id="hc-tp-roll">
                <option value="150">Standart (150 Yaprak)</option>
                <option value="200">Ekonomik (200 Yaprak)</option>
                <option value="300">Dev Rulo (300 Yaprak)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTpUsageHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tp-usage-result">
            <div class="hc-result-item">
                <span>Yıllık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-tp-rolls">0 Rulo</span>
            </div>
            <p class="hc-tp-info" id="hc-res-tp-total-sheets">Toplam 0 yaprak.</p>
        </div>
    </div>
    <?php
}
