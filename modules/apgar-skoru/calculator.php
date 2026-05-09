<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_apgar_skoru( $atts ) {
    wp_enqueue_script(
        'hc-apgar-skoru',
        HC_PLUGIN_URL . 'modules/apgar-skoru/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-apgar-skoru-css',
        HC_PLUGIN_URL . 'modules/apgar-skoru/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-apgar-skoru">
        <h3>APGAR Skoru Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>1. Kalp Hızı (Heart Rate)</label>
            <select class="hc-apgar-q" id="hc-apgar-q1">
                <option value="0">Yok (Atım yok)</option>
                <option value="1">Yavaş (< 100 vuru/dakika)</option>
                <option value="2">Hızlı (> 100 vuru/dakika)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>2. Solunum Çabası (Effort)</label>
            <select class="hc-apgar-q" id="hc-apgar-q2">
                <option value="0">Yok / Solumuyor</option>
                <option value="1">Yavaş, düzensiz veya zayıf ağlama</option>
                <option value="2">Düzenli, güçlü ağlama</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>3. Kas Tonusu (Muscle Tone)</label>
            <select class="hc-apgar-q" id="hc-apgar-q3">
                <option value="0">Gevşek / Hareketsiz</option>
                <option value="1">Ekstremitelerde hafif fleksiyon (bükülme)</option>
                <option value="2">Aktif hareketler</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>4. Refleks Cevabı (Grimace)</label>
            <select class="hc-apgar-q" id="hc-apgar-q4">
                <option value="0">Yanıt yok</option>
                <option value="1">Yüz buruşturma (Grimace)</option>
                <option value="2">Öksürme, hapşırma veya ağlama</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>5. Cilt Rengi (Appearance)</label>
            <select class="hc-apgar-q" id="hc-apgar-q5">
                <option value="0">Tamamen mavi veya soluk</option>
                <option value="1">Gövde pembe, ekstremiteler (el/ayak) mavi</option>
                <option value="2">Vücudun tamamı pembe</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcApgarHesapla()">Skoru Hesapla</button>
        
        <div class="hc-result" id="hc-apgar-skoru-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Toplam APGAR Skoru</span>
                <span class="hc-result-value" id="hc-apgar-res-puan">0</span>
            </div>
            
            <div id="hc-apgar-res-yorum" style="margin-top: 20px; padding: 18px; border-radius: 12px; font-size: 15px; line-height: 1.6; text-align: center;">
            </div>

            <p style="font-size: 12px; color: var(--hc-front-muted); margin-top: 15px; font-style: italic;">
                * APGAR skoru genellikle doğumdan 1 ve 5 dakika sonra hesaplanır. Bu test sadece tıbbi personelin değerlendirmesi için bir rehberdir.
            </p>
        </div>
    </div>
    <?php
}
