<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kahve_kafein_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kahve-kafein-hesaplama',
        HC_PLUGIN_URL . 'modules/kahve-kafein-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kahve-kafein-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kahve-kafein-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kahve-kafein-hesaplama">
        <h3>Kahve Kafein Miktarı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kkh-tur">Kahve Türü</label>
            <select id="hc-kkh-tur">
                <option value="filtre">Filtre Kahve (Drip)</option>
                <option value="turk">Türk Kahvesi</option>
                <option value="espresso">Espresso (Shot)</option>
                <option value="hazir">Hazır Kahve (Granül)</option>
                <option value="americano">Americano</option>
                <option value="latte">Latte / Cappuccino</option>
                <option value="coldbrew">Cold Brew (Soğuk Demleme)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-kkh-boyut">Porsiyon Boyutu</label>
            <select id="hc-kkh-boyut">
                <option value="kucuk">Küçük Boy / Fincan (150ml)</option>
                <option value="orta">Orta Boy / Kupa (240ml)</option>
                <option value="buyuk">Büyük Boy (350ml)</option>
                <option value="shot">Espresso Shot (30ml)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-kkh-adet">Kaç Porsiyon İçildi?</label>
            <input type="number" id="hc-kkh-adet" value="1" min="1">
        </div>
        
        <button class="hc-btn" onclick="hcKahveKafeinHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kahve-kafein-hesaplama-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Tahmini Kafein Miktarı</span>
                <span class="hc-result-value" id="hc-kkh-res-mg">0 mg</span>
            </div>
            
            <div style="margin-top: 20px; padding: 15px; background: rgba(21, 94, 239, 0.05); border-radius: 12px; font-size: 13px; line-height: 1.5;">
                <strong>Not:</strong> Kahve çekirdeğinin türü (Arabica/Robusta) ve kavrulma derecesi kafein miktarını %20'ye kadar değiştirebilir. Bu değerler ortalama porsiyonları baz alır.
            </div>
        </div>
    </div>
    <?php
}
