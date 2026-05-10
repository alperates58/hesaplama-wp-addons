<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seri_toplami_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-series-sum',
        HC_PLUGIN_URL . 'modules/seri-toplami-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-series">
        <h3>Seri Toplamı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ss-type">Seri Türü:</label>
            <select id="hc-ss-type" onchange="hcSeriesTypeChange()">
                <option value="arithmetic">Aritmetik (Artış Miktarı Sabit)</option>
                <option value="geometric">Geometrik (Katlanarak Artan)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-a1">İlk Terim (a₁):</label>
            <input type="number" id="hc-ss-a1" placeholder="1">
        </div>
        <div class="hc-form-group">
            <label id="hc-ss-diff-label" for="hc-ss-diff">Ortak Fark (d):</label>
            <input type="number" id="hc-ss-diff" placeholder="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-n">Terim Sayısı (n):</label>
            <input type="number" id="hc-ss-n" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcSeriesSumHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-seri-toplami-result">
            <strong>Seri Toplamı (Sₙ):</strong>
            <div id="hc-ss-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
