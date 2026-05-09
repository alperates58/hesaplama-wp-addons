<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kalori_acigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kalori-acigi',
        HC_PLUGIN_URL . 'modules/kalori-acigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kalori-acigi-css',
        HC_PLUGIN_URL . 'modules/kalori-acigi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kalori-acigi">
        <h3>Kalori Açığı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ka-cinsiyet">Cinsiyet</label>
            <select id="hc-ka-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ka-yas">Yaş</label>
            <input type="number" id="hc-ka-yas" placeholder="Örn: 30">
        </div>

        <div class="hc-form-group">
            <label for="hc-ka-boy">Boy (cm)</label>
            <input type="number" id="hc-ka-boy" placeholder="cm">
        </div>

        <div class="hc-form-group">
            <label for="hc-ka-kilo">Mevcut Kilo (kg)</label>
            <input type="number" id="hc-ka-kilo" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-ka-aktivite">Aktivite Düzeyi</label>
            <select id="hc-ka-aktivite">
                <option value="1.2">Hareketsiz (Masa başı iş)</option>
                <option value="1.375">Hafif Hareketli (Haftada 1-3 gün egzersiz)</option>
                <option value="1.55">Orta Hareketli (Haftada 3-5 gün egzersiz)</option>
                <option value="1.725">Çok Hareketli (Haftada 6-7 gün ağır egzersiz)</option>
                <option value="1.9">Ekstra Hareketli (Profesyonel sporcu, fiziksel iş)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ka-hedef">Haftalık Kilo Kaybı Hedefi (kg)</label>
            <select id="hc-ka-hedef">
                <option value="0.25">0,25 kg (Yavaş ve Sürdürülebilir)</option>
                <option value="0.5">0,50 kg (Önerilen)</option>
                <option value="0.75">0,75 kg (Hızlı)</option>
                <option value="1.0">1,00 kg (Çok Hızlı - Zorlayıcı)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcKaloriAcigiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-kalori-acigi-result">
            <div class="hc-result-item">
                <span>Günlük Toplam Enerji Harcamanız (TDEE):</span>
                <strong id="hc-ka-tdee">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Önerilen Günlük Kalori Açığı:</span>
                <strong id="hc-ka-deficit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Hedef Günlük Kalori Alımı:</span>
                <div class="hc-result-value" id="hc-ka-target">-</div>
            </div>
            <p id="hc-ka-warning" style="color: #d93025; font-size: 0.9em; margin-top: 10px; display: none;">
                Uyarı: Günlük kalori alımınızın 1.200 kcal (kadınlar) veya 1.500 kcal (erkekler) altına düşmesi önerilmez.
            </p>
        </div>
    </div>
    <?php
}
