<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_turkiye_yuzuk_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tr-yuzuk',
        HC_PLUGIN_URL . 'modules/turkiye-yuzuk-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tr-yuzuk-css',
        HC_PLUGIN_URL . 'modules/turkiye-yuzuk-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tr-yuzuk">
        <h3>TR Yüzük Ölçüsü (ISO)</h3>
        <div class="hc-form-group">
            <label for="hc-tr-ring-dia">Yüzük İç Çapı (mm)</label>
            <input type="number" id="hc-tr-ring-dia" placeholder="Örn: 17.2" step="0.1" min="10">
        </div>
        <button class="hc-btn" onclick="hcTrYuzukHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tr-yuzuk-result">
            <div class="hc-result-item">
                <span>Türkiye Ölçüsü:</span>
                <span class="hc-result-value" id="hc-res-tr-ring">0</span>
            </div>
            <p class="hc-ring-note">Eski bir yüzüğünüzün iç çapını cetvel yardımıyla ölçerek en doğru sonucu alabilirsiniz.</p>
        </div>
    </div>
    <?php
}
