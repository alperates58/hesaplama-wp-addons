<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuk_kan_hacmi( $atts ) {
    wp_enqueue_script(
        'hc-cocuk-kan-hacmi',
        HC_PLUGIN_URL . 'modules/cocuk-kan-hacmi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cocuk-kan-hacmi-css',
        HC_PLUGIN_URL . 'modules/cocuk-kan-hacmi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cocuk-kan-hacmi">
        <h3>Çocuk Kan Hacmi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ckh-kilo">Çocuğun Ağırlığı (kg)</label>
            <input type="number" id="hc-ckh-kilo" placeholder="Örn: 25" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ckh-yas-grubu">Yaş Grubu</label>
            <select id="hc-ckh-yas-grubu">
                <option value="yenidogan">Yeni Doğan (Prematüre)</option>
                <option value="yenidogan_term">Yeni Doğan (Zamanında)</option>
                <option value="bebek">Bebek (1-12 Ay)</option>
                <option value="cocuk">Çocuk (> 1 Yaş)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcKanHacmiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cocuk-kan-hacmi-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Tahmini Toplam Kan Hacmi</span>
                <span class="hc-result-value" id="hc-ckh-res-hacim">0 ml</span>
            </div>
            
            <div style="margin-top: 20px; padding: 15px; background: rgba(21, 94, 239, 0.05); border-radius: 12px; font-size: 13px; line-height: 1.5;">
                <strong>Bilgi:</strong> Kan hacmi hesaplaması, pediatrik doz ayarlamaları ve sıvı tedavisi için önemlidir. Ortalama değerler: Yeni doğanlarda 85-90 ml/kg, çocuklarda 75 ml/kg civarındadır.
            </div>
        </div>
    </div>
    <?php
}
