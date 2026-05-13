<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_orneklem_buyuklugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-orneklem-buyuklugu-hesaplama',
        HC_PLUGIN_URL . 'modules/orneklem-buyuklugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-orneklem-buyuklugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/orneklem-buyuklugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-orneklem-buyuklugu-hesaplama">
        <h3>Örneklem Büyüklüğü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ss-pop">Hedef Evren Büyüklüğü (Opsiyonel)</label>
            <input type="number" id="hc-ss-pop" min="0" placeholder="Bilinmiyorsa boş bırakın">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-conf">Güven Düzeyi (%)</label>
            <select id="hc-ss-conf">
                <option value="1.645">90%</option>
                <option value="1.96" selected>95%</option>
                <option value="2.576">99%</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-error">Kabul Edilebilir Hata Payı (%)</label>
            <input type="number" id="hc-ss-error" value="5" min="0.1" max="20" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-p">Beklenen Oran (p) [%]</label>
            <input type="number" id="hc-ss-p" value="50" min="0" max="100">
        </div>
        <button class="hc-btn" onclick="hcOrneklemBuyukluguHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-orneklem-buyuklugu-hesaplama-result">
            <span class="hc-label">Gerekli Örneklem Büyüklüğü:</span>
            <div class="hc-result-value" id="hc-ss-res-value">0</div>
            <div id="hc-ss-res-desc" style="margin-top:10px; font-style:italic;"></div>
        </div>
    </div>
    <?php
}
