<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yag_yakim_nabiz_araligi_hesaplama( $atts ) {
    // Bu modül 1. gruptaki "Yağ Yakım Nabız Bölgesi" ile aynı mantığa sahiptir.
    // Kullanıcının listesinde iki ayrı başlık olduğu için her ikisini de aynı fonksiyonla besliyoruz.
    wp_enqueue_script(
        'hc-fat-burn-range',
        HC_PLUGIN_URL . 'modules/yag-yakim-nabiz-bolgesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fat-burn-range-css',
        HC_PLUGIN_URL . 'modules/yag-yakim-nabiz-bolgesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fat-burn-range">
        <h3>Yağ Yakım Nabız Aralığı</h3>
        <div class="hc-form-group">
            <label for="hc-fbr-age">Yaşınız:</label>
            <input type="number" id="hc-fbr-age" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-fbr-rest">Dinlenik Nabız (BPM):</label>
            <input type="number" id="hc-fbr-rest" placeholder="70">
        </div>
        <button class="hc-btn" onclick="hcFatBurnRangeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fat-burn-range-result">
            <strong>İdeal Aralığınız:</strong>
            <div id="hc-fbr-res-val" class="hc-result-value">-</div>
            <span>BPM</span>
        </div>
    </div>
    <script>
        function hcFatBurnRangeHesapla() {
            // calculator.js'deki mantığı buraya proxy ediyoruz
            const age = parseInt(document.getElementById('hc-fbr-age').value);
            const restHr = parseInt(document.getElementById('hc-fbr-rest').value);
            if (!age || !restHr) { alert('Lütfen bilgileri giriniz.'); return; }
            const maxHr = 220 - age;
            const hrr = maxHr - restHr;
            const low = Math.round((hrr * 0.60) + restHr);
            const high = Math.round((hrr * 0.70) + restHr);
            document.getElementById('hc-fbr-res-val').innerText = low + " - " + high;
            document.getElementById('hc-fat-burn-range-result').classList.add('visible');
        }
    </script>
    <?php
}
