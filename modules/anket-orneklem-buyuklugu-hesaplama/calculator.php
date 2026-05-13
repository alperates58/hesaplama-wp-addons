<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_anket_orneklem_buyuklugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-anket-orneklem-buyuklugu-hesaplama',
        HC_PLUGIN_URL . 'modules/anket-orneklem-buyuklugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-anket-orneklem-buyuklugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/anket-orneklem-buyuklugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sample-size">
        <h3>Anket Örneklem Büyüklüğü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ss-pop">Evren (Popülasyon) Büyüklüğü (Bilinmiyorsa boş bırakın):</label>
            <input type="number" id="hc-ss-pop" class="hc-input" placeholder="Örn: 10000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-conf">Güven Düzeyi (%):</label>
            <select id="hc-ss-conf" class="hc-input">
                <option value="1.645">90%</option>
                <option value="1.96" selected>95%</option>
                <option value="2.576">99%</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-error">Hata Payı (%):</label>
            <input type="number" id="hc-ss-error" class="hc-input" value="5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcSampleSizeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-anket-orneklem-buyuklugu-hesaplama-result">
            <div class="hc-result-label">Gerekli Minimum Örneklem Büyüklüğü:</div>
            <div class="hc-result-value" id="hc-res-ss-val">-</div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Not: Oran (p) %50 olarak varsayılmıştır (en büyük örneklem ihtiyacı için).</p>
        </div>
    </div>
    <?php
}
