<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_barthel_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-barthel-indeksi-hesaplama',
        HC_PLUGIN_URL . 'modules/barthel-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-barthel-indeksi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/barthel-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-barthel">
        <h3>Barthel İndeksi (ADL)</h3>
        <div class="hc-quiz-group">
            <p>1. Beslenme</p>
            <select class="hc-bi-q" data-score="0,5,10">
                <option value="0">Yardımsız yiyemez</option>
                <option value="5">Yardıma ihtiyacı var (yemek kesme vb.)</option>
                <option value="10">Bağımsız</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>2. Banyo Yapma</p>
            <select class="hc-bi-q" data-score="0,5">
                <option value="0">Yardıma ihtiyacı var</option>
                <option value="5">Bağımsız</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>3. Kişisel Bakım</p>
            <select class="hc-bi-q" data-score="0,5">
                <option value="0">Yardıma ihtiyacı var</option>
                <option value="5">Bağımsız</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>4. Giyinme</p>
            <select class="hc-bi-q" data-score="0,5,10">
                <option value="0">Bağımlı</option>
                <option value="5">Yardıma ihtiyacı var</option>
                <option value="10">Bağımsız</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>5. Bağırsak Kontrolü</p>
            <select class="hc-bi-q" data-score="0,5,10">
                <option value="0">İnkontinan (Kaçırıyor)</option>
                <option value="5">Ara sıra kaza oluyor</option>
                <option value="10">Kontrollü</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>6. Mesane Kontrolü</p>
            <select class="hc-bi-q" data-score="0,5,10">
                <option value="0">İnkontinan</option>
                <option value="5">Ara sıra kaza oluyor</option>
                <option value="10">Kontrollü</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>7. Tuvalet Kullanımı</p>
            <select class="hc-bi-q" data-score="0,5,10">
                <option value="0">Bağımlı</option>
                <option value="5">Yardıma ihtiyacı var</option>
                <option value="10">Bağımsız</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>8. Transfer (Yataktan sandalyeye)</p>
            <select class="hc-bi-q" data-score="0,5,10,15">
                <option value="0">Yapamaz</option>
                <option value="5">Büyük yardım gerekiyor</option>
                <option value="10">Küçük yardım gerekiyor</option>
                <option value="15">Bağımsız</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>9. Hareketlilik (Düz yolda yürüme)</p>
            <select class="hc-bi-q" data-score="0,5,10,15">
                <option value="0">Hareket edemez</option>
                <option value="5">Tekerlekli sandalye kullanıyor</option>
                <option value="10">Yardımla yürüyor</option>
                <option value="15">Bağımsız</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>10. Merdiven Çıkma</p>
            <select class="hc-bi-q" data-score="0,5,10">
                <option value="0">Yapamaz</option>
                <option value="5">Yardım gerekiyor</option>
                <option value="10">Bağımsız</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBarthelHesapla()">Skoru Hesapla</button>
        <div class="hc-result" id="hc-bi-result">
            <div class="hc-result-label">Toplam Puan:</div>
            <div class="hc-result-value" id="hc-bi-val">-</div>
            <p id="hc-bi-desc" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
