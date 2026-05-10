<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_apgar_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-apgar-skoru-hesaplama',
        HC_PLUGIN_URL . 'modules/apgar-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-apgar-skoru-hesaplama-css',
        HC_PLUGIN_URL . 'modules/apgar-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-apgar">
        <h3>APGAR Skoru</h3>
        <div class="hc-quiz-group">
            <p>1. Görünüm (Cilt Rengi)</p>
            <select class="hc-ap-q">
                <option value="0">Mavi-soluk (0)</option>
                <option value="1">Gövde pembe, el-ayak mavi (1)</option>
                <option value="2">Tamamen pembe (2)</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>2. Nabız (Kalp Hızı)</p>
            <select class="hc-ap-q">
                <option value="0">Yok (0)</option>
                <option value="1">100 altı (1)</option>
                <option value="2">100 üstü (2)</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>3. Yüz Buruşturma (Refleks İrritabilite)</p>
            <select class="hc-ap-q">
                <option value="0">Yanıt yok (0)</option>
                <option value="1">Yüz buruşturma / zayıf ağlama (1)</option>
                <option value="2">Ağlama, hapşırma, öksürme (2)</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>4. Aktivite (Kas Tonusu)</p>
            <select class="hc-ap-q">
                <option value="0">Gevşek / Flask (0)</option>
                <option value="1">Ekstremitelerde hafif fleksiyon (1)</option>
                <option value="2">Aktif hareket (2)</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>5. Solunum</p>
            <select class="hc-ap-q">
                <option value="0">Yok (0)</option>
                <option value="1">Yavaş, düzensiz (1)</option>
                <option value="2">İyi, güçlü ağlama (2)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAPGARHesapla()">Skoru Hesapla</button>
        <div class="hc-result" id="hc-ap-result">
            <div class="hc-result-label">Toplam Puan:</div>
            <div class="hc-result-value" id="hc-ap-val">-</div>
            <p id="hc-ap-desc" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
