<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cay_kafein_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cay-kafein-hesaplama',
        HC_PLUGIN_URL . 'modules/cay-kafein-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cay-kafein-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cay-kafein-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cay-kafein-hesaplama">
        <h3>Çay Kafein Miktarı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ckh-tur">Çay Türü</label>
            <select id="hc-ckh-tur">
                <option value="siyah">Siyah Çay (Klasik)</option>
                <option value="yesil">Yeşil Çay</option>
                <option value="beyaz">Beyaz Çay</option>
                <option value="oolong">Oolong Çayı</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ckh-boyut">Bardak Boyutu</label>
            <select id="hc-ckh-boyut">
                <option value="ince">İnce Belli Çay Bardağı (100ml)</option>
                <option value="kupa">Kupa / Büyük Bardak (250ml)</option>
                <option value="fincan">Çay Fincanı (150ml)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ckh-adet">Kaç Bardak İçildi?</label>
            <input type="number" id="hc-ckh-adet" value="1" min="1">
        </div>
        
        <button class="hc-btn" onclick="hcCayKafeinHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cay-kafein-hesaplama-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Tahmini Kafein Miktarı</span>
                <span class="hc-result-value" id="hc-ckh-res-mg">0 mg</span>
            </div>
            
            <div style="margin-top: 20px; padding: 15px; background: rgba(21, 94, 239, 0.05); border-radius: 12px; font-size: 13px; line-height: 1.5;">
                <strong>Bilgi:</strong> Çayın demlenme süresi arttıkça kafein oranı yükselir. Bu hesaplama ortalama demlenme sürelerini (3-5 dk) baz alır.
            </div>
        </div>
    </div>
    <?php
}
