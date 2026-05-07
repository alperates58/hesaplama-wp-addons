<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nikotin_bagimliligi_testi( $atts ) {
    wp_enqueue_script(
        'hc-nikotin-bagimliligi-testi',
        HC_PLUGIN_URL . 'modules/nikotin-bagimliligi-testi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nikotin-bagimliligi-testi-css',
        HC_PLUGIN_URL . 'modules/nikotin-bagimliligi-testi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nikotin-bagimliligi-testi">
        <h3>Nikotin Bağımlılığı Testi (Fagerström)</h3>
        
        <div class="hc-form-group">
            <label>1. İlk sigaranızı uyandıktan ne kadar süre sonra içersiniz?</label>
            <select class="hc-nbt-q" id="hc-nbt-q1">
                <option value="3">0-5 dakika</option>
                <option value="2">6-30 dakika</option>
                <option value="1">31-60 dakika</option>
                <option value="0">60 dakikadan sonra</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>2. Sigara içmenin yasak olduğu yerlerde bu yasağa uymakta zorlanıyor musunuz?</label>
            <select class="hc-nbt-q" id="hc-nbt-q2">
                <option value="1">Evet</option>
                <option value="0">Hayır</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>3. Hangi sigaradan vazgeçmek sizi daha çok zorlar?</label>
            <select class="hc-nbt-q" id="hc-nbt-q3">
                <option value="1">Sabah içilen ilk sigara</option>
                <option value="0">Diğer herhangi bir sigara</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>4. Günde kaç adet sigara içiyorsunuz?</label>
            <select class="hc-nbt-q" id="hc-nbt-q4">
                <option value="0">10 veya daha az</option>
                <option value="1">11-20</option>
                <option value="2">21-30</option>
                <option value="3">31 ve üzeri</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>5. Sabah saatlerinde günün diğer saatlerine göre daha çok sigara içer misiniz?</label>
            <select class="hc-nbt-q" id="hc-nbt-q5">
                <option value="1">Evet</option>
                <option value="0">Hayır</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>6. Çok hasta olsanız bile sigara içer misiniz?</label>
            <select class="hc-nbt-q" id="hc-nbt-q6">
                <option value="1">Evet</option>
                <option value="0">Hayır</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcNikotinHesapla()">Testi Tamamla</button>
        
        <div class="hc-result" id="hc-nikotin-bagimliligi-testi-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Bağımlılık Skoru</span>
                <span class="hc-result-value" id="hc-nbt-res-puan">0</span>
            </div>
            
            <div id="hc-nbt-res-yorum" style="margin-top: 20px; padding: 18px; border-radius: 12px; font-size: 15px; line-height: 1.6; text-align: center;">
            </div>

            <p style="font-size: 12px; color: var(--hc-front-muted); margin-top: 15px; font-style: italic;">
                * Bu test bağımlılık düzeyiniz hakkında bir fikir vermeyi amaçlar. Sigarayı bırakmak için bir uzmandan destek almanız önerilir.
            </p>
        </div>
    </div>
    <?php
}
