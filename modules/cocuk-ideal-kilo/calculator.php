<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuk_ideal_kilo( $atts ) {
    wp_enqueue_script(
        'hc-cocuk-ideal-kilo',
        HC_PLUGIN_URL . 'modules/cocuk-ideal-kilo/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cocuk-ideal-kilo-css',
        HC_PLUGIN_URL . 'modules/cocuk-ideal-kilo/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cocuk-ideal-kilo">
        <h3>Çocuk İdeal Kilo Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cik-yas">Çocuğun Yaşı</label>
            <input type="number" id="hc-cik-yas" placeholder="Örn: 5" min="1" max="18">
        </div>

        <div class="hc-form-group">
            <label for="hc-cik-cinsiyet">Cinsiyet</label>
            <select id="hc-cik-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kız</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcCocukIdealKiloHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cocuk-ideal-kilo-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Tahmini İdeal Kilo</span>
                <span class="hc-result-value" id="hc-cik-res-kilo">0 kg</span>
            </div>
            
            <div style="margin-top: 20px; padding: 15px; background: rgba(15, 138, 95, 0.05); border-radius: 12px; font-size: 13px; line-height: 1.5; color: var(--hc-front-green);">
                <strong>Bilgi:</strong> Bu hesaplama Weech formülünü temel alır. İdeal kilo bir aralık olarak düşünülmelidir. Çocuğun boyu ve kemik yapısı ideal kiloyu etkileyen en önemli faktörlerdir.
            </div>
        </div>
    </div>
    <?php
}
