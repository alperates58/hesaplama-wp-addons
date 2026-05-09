<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tahmini_gunluk_enerji_ihtiyaci( $atts ) {
    wp_enqueue_script(
        'hc-eer',
        HC_PLUGIN_URL . 'modules/tahmini-gunluk-enerji-ihtiyaci/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-eer">
        <h3>Tahmini Günlük Enerji İhtiyacı (EER)</h3>
        
        <div class="hc-form-group">
            <label for="hc-eer-cinsiyet">Cinsiyet</label>
            <select id="hc-eer-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-eer-yas">Yaş</label>
            <input type="number" id="hc-eer-yas" placeholder="Yaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-eer-boy">Boy (cm)</label>
            <input type="number" id="hc-eer-boy" placeholder="cm">
        </div>

        <div class="hc-form-group">
            <label for="hc-eer-kilo">Kilo (kg)</label>
            <input type="number" id="hc-eer-kilo" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-eer-aktivite">Aktivite Seviyesi</label>
            <select id="hc-eer-aktivite">
                <option value="sedentary">Hareketsiz (Masa başı)</option>
                <option value="low">Az Hareketli (Günlük yürüyüş vb.)</option>
                <option value="active">Hareketli (Düzenli egzersiz)</option>
                <option value="very">Çok Hareketli (Ağır egzersiz/iş)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcEERHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-eer-result">
            <span>Tahmini Günlük Enerji İhtiyacınız:</span>
            <div class="hc-result-value" id="hc-eer-value">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *EER (Estimated Energy Requirement), sağlıklı yetişkinlerin enerji dengesini korumaları için gereken ortalama enerji alımıdır.
            </p>
        </div>
    </div>
    <?php
}
