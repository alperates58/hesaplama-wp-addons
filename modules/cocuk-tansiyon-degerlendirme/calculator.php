<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuk_tansiyon_degerlendirme( $atts ) {
    wp_enqueue_script(
        'hc-cocuk-tansiyon',
        HC_PLUGIN_URL . 'modules/cocuk-tansiyon-degerlendirme/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cocuk-tansiyon-css',
        HC_PLUGIN_URL . 'modules/cocuk-tansiyon-degerlendirme/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cocuk-tansiyon">
        <h3>Çocuk Tansiyon Değerlendirme</h3>
        
        <div class="hc-form-group">
            <label for="hc-ct-cinsiyet">Cinsiyet</label>
            <select id="hc-ct-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kız</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ct-yas">Yaş (1-17)</label>
            <input type="number" id="hc-ct-yas" placeholder="Örn: 8" min="1" max="17">
        </div>

        <div class="hc-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label for="hc-ct-sis">Büyük Tansiyon (Sistolik)</label>
                <input type="number" id="hc-ct-sis" placeholder="Örn: 110">
            </div>

            <div class="hc-form-group">
                <label for="hc-ct-diy">Küçük Tansiyon (Diyastolik)</label>
                <input type="number" id="hc-ct-diy" placeholder="Örn: 70">
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcCocukTansiyonHesapla()">Değerlendir</button>
        
        <div class="hc-result" id="hc-cocuk-tansiyon-result">
            <div id="hc-ct-res-yorum" style="padding: 20px; border-radius: 14px; text-align: center; font-size: 16px; line-height: 1.6;">
            </div>

            <div style="margin-top: 20px; padding: 15px; background: #f8fafc; border-radius: 12px; font-size: 13px; color: var(--hc-front-muted);">
                <strong>Önemli Bilgi:</strong> Çocuklarda tansiyon değerleri yaş, cinsiyet ve boya göre değişir. Bu araç genel klinik ortalamaları baz alır. Tansiyon yüksekliği saptanması durumunda mutlaka bir çocuk kardiyoloğuna danışılmalıdır.
            </div>
        </div>
    </div>
    <?php
}
