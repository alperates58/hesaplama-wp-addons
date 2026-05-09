<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cit_malzemesi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cit-malzemesi-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/cit-malzemesi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cit-malzemesi-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cit-malzemesi-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cit-malzemesi-miktari-hesaplama">
        <h3>Çit Malzemesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cmm-len">Toplam Çit Uzunluğu (m)</label>
            <input type="number" id="hc-cmm-len" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-cmm-spacing">Direk Aralığı (m)</label>
            <input type="number" id="hc-cmm-spacing" value="2.5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-cmm-rails">Yatay Ray/Kuşak Sayısı (Adet/Bölüm)</label>
            <input type="number" id="hc-cmm-rails" value="2" min="0">
        </div>
        <button class="hc-btn" onclick="hcCMMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cmm-result">
            <div class="hc-cmm-grid">
                <div class="hc-cmm-item">
                    <span class="hc-result-label">Gereken Direk:</span>
                    <span class="hc-result-value" id="hc-cmm-posts">-</span>
                </div>
                <div class="hc-cmm-item">
                    <span class="hc-result-label">Gereken Ray (m):</span>
                    <span class="hc-result-value" id="hc-cmm-raillen">-</span>
                </div>
            </div>
            <div class="hc-result-note">Başlangıç ve bitiş direkleri dahildir.</div>
        </div>
    </div>
    <?php
}
