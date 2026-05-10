<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sigara_bagimliligi_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sigara-bagimliligi-testi-hesaplama',
        HC_PLUGIN_URL . 'modules/sigara-bagimliligi-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sigara-bagimliligi-testi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sigara-bagimliligi-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fagerstrom">
        <h3>Fagerström Nikotin Bağımlılık Testi</h3>
        <div class="hc-quiz-group">
            <p>1. Uyandıktan ne kadar sonra ilk sigaranızı içersiniz?</p>
            <select class="hc-fa-q">
                <option value="3">İlk 5 dakika (3)</option>
                <option value="2">6 - 30 dakika (2)</option>
                <option value="1">31 - 60 dakika (1)</option>
                <option value="0">60 dakikadan sonra (0)</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>2. Sigara içmenin yasak olduğu yerlerde zorlanıyor musunuz?</p>
            <select class="hc-fa-q">
                <option value="1">Evet (1)</option>
                <option value="0">Hayır (0)</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>3. Hangi sigaradan vazgeçmek size daha zor gelir?</p>
            <select class="hc-fa-q">
                <option value="1">Sabah ilk sigara (1)</option>
                <option value="0">Diğerleri (0)</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>4. Günde kaç tane sigara içiyorsunuz?</p>
            <select class="hc-fa-q">
                <option value="0">10 veya daha az (0)</option>
                <option value="1">11 - 20 (1)</option>
                <option value="2">21 - 30 (2)</option>
                <option value="3">31 ve daha fazla (3)</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>5. Sabahın ilk saatlerinde, günün diğer saatlerine göre daha çok mu sigara içersiniz?</p>
            <select class="hc-fa-q">
                <option value="1">Evet (1)</option>
                <option value="0">Hayır (0)</option>
            </select>
        </div>
        <div class="hc-quiz-group">
            <p>6. Çok hasta olduğunuzda bile sigara içer misiniz?</p>
            <select class="hc-fa-q">
                <option value="1">Evet (1)</option>
                <option value="0">Hayır (0)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSigaraHesapla()">Testi Bitir</button>
        <div class="hc-result" id="hc-fa-result">
            <div class="hc-result-label">Bağımlılık Skoru:</div>
            <div class="hc-result-value" id="hc-fa-val">-</div>
            <p id="hc-fa-desc" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
