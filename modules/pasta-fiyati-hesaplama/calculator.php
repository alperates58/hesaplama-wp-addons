<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pasta_fiyati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cake-pricing-js',
        HC_PLUGIN_URL . 'modules/pasta-fiyati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cake-pricing-css',
        HC_PLUGIN_URL . 'modules/pasta-fiyati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cake-pricing">
        <h3>Pasta Fiyatı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cp-count">Kişi Sayısı (Porsiyon)</label>
            <input type="number" id="hc-cp-count" value="10" min="5">
        </div>

        <div class="hc-form-group">
            <label for="hc-cp-base">Porsiyon Başına Malzeme Maliyeti (₺)</label>
            <input type="number" id="hc-cp-base" value="25" min="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-cp-design">Tasarım Karmaşıklığı</label>
            <select id="hc-cp-design">
                <option value="1.5">Standart (Basit Süsleme)</option>
                <option value="2.5">Butik (Şeker Hamuru, Figür)</option>
                <option value="4.0">Özel Tasarım (Detaylı El İşçiliği)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcPastaFiyatiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-cake-pricing-result">
            <div class="hc-result-item">
                <span>Önerilen Satış Fiyatı:</span>
                <strong class="hc-result-value" id="hc-cp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama: (Malzeme Maliyeti × Porsiyon) × Tasarım Katsayısı formülü baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
