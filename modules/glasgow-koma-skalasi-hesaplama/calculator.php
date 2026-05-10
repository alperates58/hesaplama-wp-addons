<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_glasgow_koma_skalasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-glasgow-koma-skalasi-hesaplama',
        HC_PLUGIN_URL . 'modules/glasgow-koma-skalasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-glasgow-koma-skalasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/glasgow-koma-skalasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gcs">
        <h3>Glasgow Koma Skalası (GKS)</h3>
        <div class="hc-quiz-group">
            <p>1. Göz Yanıtı (E)</p>
            <select id="hc-gcs-e">
                <option value="4">Spontan açık (4)</option>
                <option value="3">Sesli uyaranla açılıyor (3)</option>
                <option value="2">Ağrılı uyaranla açılıyor (2)</option>
                <option value="1">Yanıt yok (1)</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>2. Sözel Yanıt (V)</p>
            <select id="hc-gcs-v">
                <option value="5">Oryante ve koopere (5)</option>
                <option value="4">Konfüze (4)</option>
                <option value="3">Anlamsız kelimeler (3)</option>
                <option value="2">Anlamsız sesler (2)</option>
                <option value="1">Yanıt yok (1)</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>3. Motor Yanıt (M)</p>
            <select id="hc-gcs-m">
                <option value="6">Emirlere uyuyor (6)</option>
                <option value="5">Ağrıyı lokalize ediyor (5)</option>
                <option value="4">Ağrıdan kaçıyor (fleksiyon) (4)</option>
                <option value="3">Anormal fleksiyon (dekortike) (3)</option>
                <option value="2">Anormal ekstansiyon (deserebre) (2)</option>
                <option value="1">Yanıt yok (1)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcGKSHesapla()">Skoru Hesapla</button>
        <div class="hc-result" id="hc-gcs-result">
            <div class="hc-result-label">Toplam Puan:</div>
            <div class="hc-result-value" id="hc-gcs-val">-</div>
            <p id="hc-gcs-desc" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
