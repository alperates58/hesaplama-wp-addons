<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_boya_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boya-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/boya-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-boya-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/boya-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-boya-miktari-hesaplama">
        <h3>Boya Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-boy-area">Toplam Yüzey Alanı (m²)</label>
            <input type="number" id="hc-boy-area" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-boy-coats">Kat Sayısı</label>
            <input type="number" id="hc-boy-coats" value="2" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-boy-coverage">1 Litre ile Boyanan Alan (m²)</label>
            <input type="number" id="hc-boy-coverage" placeholder="Örn: 12" value="12" step="any">
        </div>
        <button class="hc-btn" onclick="hcBoyaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-boy-result">
            <div class="hc-result-label">Gereken Toplam Boya:</div>
            <div class="hc-result-value" id="hc-boy-val">-</div>
            <div class="hc-result-note">Yüzeyin emiciliğine göre miktar değişkenlik gösterebilir.</div>
        </div>
    </div>
    <?php
}
