<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ruhsal_yas_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-spiritual-age',
        HC_PLUGIN_URL . 'modules/ruhsal-yas-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-spiritual-age-calc">
        <h3>Ruhsal Yaş Analizi</h3>
        <p>Lütfen aşağıdaki soruları size en uygun şekilde cevaplayın:</p>

        <div class="hc-form-group">
            <label>1. Hayata karşı genel tutumunuz nedir?</label>
            <select id="hc-sa-q1" class="hc-input">
                <option value="1">Keşfetmek ve eğlenmek</option>
                <option value="2">Başarmak ve yükselmek</option>
                <option value="3">Anlamak ve yardım etmek</option>
                <option value="4">Gözlemlemek ve içsel huzur</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>2. Yalnız kalmak sizin için ne ifade ediyor?</label>
            <select id="hc-sa-q2" class="hc-input">
                <option value="1">Sıkıcı, hep birileri olmalı</option>
                <option value="2">Zaman zaman kafa dinlemek</option>
                <option value="3">Kendimi tanımak için fırsat</option>
                <option value="4">En sevdiğim ve en verimli halim</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>3. Maddi değerlere bakış açınız?</label>
            <select id="hc-sa-q3" class="hc-input">
                <option value="1">Sahip olmak heyecan verici</option>
                <option value="2">Güvenlik ve statü için önemli</option>
                <option value="3">Sadece birer araç, fazla önemsemem</option>
                <option value="4">Geçici dünya malı, ruhsal zenginlik esas</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>4. Başkalarının hakkınızdaki düşünceleri?</label>
            <select id="hc-sa-q4" class="hc-input">
                <option value="1">Çok önemli, onay beklerim</option>
                <option value="2">İmajım için dikkat ederim</option>
                <option value="3">Saygı duyarım ama beni tanımlamaz</option>
                <option value="4">Hiç etkilemez, kendi yolumdayım</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>5. Bilgiye ulaşma amacınız nedir?</label>
            <select id="hc-sa-q5" class="hc-input">
                <option value="1">Merakımı gidermek</option>
                <option value="2">Uzmanlaşmak ve kazanmak</option>
                <option value="3">Başkalarına faydalı olmak</option>
                <option value="4">Evrensel sırları keşfetmek</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcRuhsalYasHesapla()">Ruhsal Yaşımı Bul</button>
        
        <div class="hc-result" id="hc-ruhsal-yas-result">
            <div class="hc-result-header">Ruhsal Yaş Kategoriniz: <span id="hc-sa-value" class="hc-result-value"></span></div>
            <div id="hc-sa-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
