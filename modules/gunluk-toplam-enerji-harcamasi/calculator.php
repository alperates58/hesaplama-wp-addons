<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_toplam_enerji_harcamasi( $atts ) {
    wp_enqueue_script(
        'hc-tdee',
        HC_PLUGIN_URL . 'modules/gunluk-toplam-enerji-harcamasi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tdee">
        <h3>Günlük Toplam Enerji Harcaması (TDEE)</h3>
        
        <div class="hc-form-group">
            <label for="hc-tdee-bmh">Bazal Metabolizma Hızınız (BMH - kcal)</label>
            <input type="number" id="hc-tdee-bmh" placeholder="Örn: 1600">
            <small>Bilmiyorsanız Harris-Benedict veya Mifflin hesaplayıcıyı kullanın.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-tdee-aktivite">Aktivite Düzeyi</label>
            <select id="hc-tdee-aktivite">
                <option value="1.2">Hareketsiz (Masa başı iş, az veya hiç egzersiz)</option>
                <option value="1.375">Hafif Hareketli (Haftada 1-3 gün hafif egzersiz)</option>
                <option value="1.55">Orta Hareketli (Haftada 3-5 gün orta yoğunluklu egzersiz)</option>
                <option value="1.725">Çok Hareketli (Haftada 6-7 gün ağır egzersiz)</option>
                <option value="1.9">Ekstra Hareketli (Günde çift idman veya fiziksel iş)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcTDEEHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-tdee-result">
            <span>Günlük Toplam Enerji Harcamanız (TDEE):</span>
            <div class="hc-result-value" id="hc-tdee-value">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *TDEE (Total Daily Energy Expenditure), kilonuzu korumak için bir günde almanız gereken toplam kalori miktarıdır.
            </p>
        </div>
    </div>
    <?php
}
