<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gad_7_anksiyete_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gad-7-anksiyete-testi-hesaplama',
        HC_PLUGIN_URL . 'modules/gad-7-anksiyete-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gad-7-anksiyete-testi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gad-7-anksiyete-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    $questions = [
        "Sinirlilik, kaygı veya çok gergin hissetme",
        "Endişelenmeyi durduramama veya kontrol edememe",
        "Farklı şeyler hakkında çok fazla endişelenme",
        "Rahatlamada güçlük çekme",
        "Huzursuzluktan dolayı yerinde duramama",
        "Kolayca kızma veya sinirlenme",
        "Sanki kötü bir şey olacakmış gibi korkma"
    ];
    ?>
    <div class="hc-calculator" id="hc-gad7">
        <h3>GAD-7 Anksiyete Testi</h3>
        <p style="font-size:0.9em; color:#666; margin-bottom:20px;">Son 2 hafta içinde aşağıdaki sorunlar sizi ne sıklıkla rahatsız etti?</p>
        <?php foreach ($questions as $i => $q): ?>
            <div class="hc-quiz-group">
                <p><?php echo ($i+1) . ". " . $q; ?></p>
                <select class="hc-ga-q">
                    <option value="0">Hiçbir zaman</option>
                    <option value="1">Birkaç gün</option>
                    <option value="2">Günlerin yarısından fazla</option>
                    <option value="3">Hemen hemen her gün</option>
                </select>
            </div>
        <?php endforeach; ?>
        <button class="hc-btn" onclick="hcGAD7Hesapla()">Testi Bitir</button>
        <div class="hc-result" id="hc-ga-result">
            <div class="hc-result-label">Toplam Puan:</div>
            <div class="hc-result-value" id="hc-ga-val">-</div>
            <p id="hc-ga-desc" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
