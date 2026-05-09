<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cit_malzemesi_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cit-malzemesi-tahmini-hesaplama',
        HC_PLUGIN_URL . 'modules/cit-malzemesi-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cit-malzemesi-tahmini-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cit-malzemesi-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cit-malzemesi-tahmini-hesaplama">
        <h3>Toplu Çit Malzemesi Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-cmt-len">Toplam Çevre Uzunluğu (m)</label>
            <input type="number" id="hc-cmt-len" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-cmt-spacing">Direk Aralığı (m)</label>
            <input type="number" id="hc-cmt-spacing" value="2.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-cmt-type">Çit Tipi</label>
            <select id="hc-cmt-type">
                <option value="panel">Panel Çit (2.5m/adet)</option>
                <option value="tel">Tel Örgü (20m/top)</option>
                <option value="wooden">Ahşap Çit</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCMTHesapla()">Tahmin Et</button>
        <div class="hc-result" id="hc-cmt-result">
            <div class="hc-cmt-grid">
                <div class="hc-cmt-item">
                    <span class="hc-result-label">Direk:</span>
                    <span class="hc-result-value" id="hc-cmt-posts">-</span>
                </div>
                <div class="hc-cmt-item">
                    <span class="hc-result-label">Panel/Tel:</span>
                    <span class="hc-result-value" id="hc-cmt-main">-</span>
                </div>
                <div class="hc-cmt-item">
                    <span class="hc-result-label">Beton (Torba):</span>
                    <span class="hc-result-value" id="hc-cmt-beton">-</span>
                </div>
            </div>
            <div class="hc-result-note">Beton tahmini her direk için ~20 kg (hazır harç) baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
