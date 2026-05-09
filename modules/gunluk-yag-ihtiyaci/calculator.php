<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_yag_ihtiyaci( $atts ) {
    wp_enqueue_script(
        'hc-fat',
        HC_PLUGIN_URL . 'modules/gunluk-yag-ihtiyaci/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fat">
        <h3>Günlük Yağ İhtiyacı</h3>
        
        <div class="hc-form-group">
            <label for="hc-fat-toplam">Günlük Toplam Kalori Alımı (kcal)</label>
            <input type="number" id="hc-fat-toplam" placeholder="Örn: 2000">
        </div>

        <div class="hc-form-group">
            <label for="hc-fat-oran">Hedef Oran (%)</label>
            <select id="hc-fat-oran">
                <option value="20">Düşük Yağ (%20)</option>
                <option value="27" selected>Orta Yağ (%27 - Önerilen)</option>
                <option value="35">Yüksek Yağ (%35 - Ketojenik olmayan en üst sınır)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcYagHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gunluk-yag-result">
            <div class="hc-result-item">
                <span>Günlük Yağ Miktarı (Gram):</span>
                <div class="hc-result-value" id="hc-fat-gram">-</div>
            </div>
            <div class="hc-result-item">
                <span>Yağdan Gelen Enerji:</span>
                <strong id="hc-fat-kcal">-</strong>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *1 gram yağ yaklaşık 9 kcal enerji sağlar. Vücut fonksiyonları için günlük kalorinin en az %20'sinin yağdan gelmesi önerilir.
            </p>
        </div>
    </div>
    <?php
}
