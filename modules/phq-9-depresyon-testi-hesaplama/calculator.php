<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_phq_9_depresyon_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-phq-9-depresyon-testi-hesaplama',
        HC_PLUGIN_URL . 'modules/phq-9-depresyon-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-phq-9-depresyon-testi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/phq-9-depresyon-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    $questions = [
        "Bir şey yapmaya karşı ilgisizlik veya zevk almama",
        "Kendini keyifsiz, depresif veya umutsuz hissetme",
        "Uykuya dalmakta veya uykuda kalmakta güçlük, ya da çok fazla uyuma",
        "Kendini yorgun hissetme veya enerjinin az olması",
        "İştahsızlık veya aşırı yeme",
        "Kendini kötü hissetme; kendinin bir başarısız olduğu veya kendinizi ya da ailenizi hayal kırıklığına uğrattığınız düşüncesi",
        "Gazete okumak veya televizyon izlemek gibi şeylere konsantre olmada güçlük",
        "Başkalarının fark edebileceği kadar yavaş hareket etme veya konuşma, ya da tam tersine çok hareketli olma",
        "Ölmüş olmayı isteme veya bir şekilde kendine zarar verme düşünceleri"
    ];
    ?>
    <div class="hc-calculator" id="hc-phq9">
        <h3>PHQ-9 Depresyon Testi</h3>
        <p style="font-size:0.9em; color:#666; margin-bottom:20px;">Son 2 hafta içinde aşağıdaki sorunlar sizi ne sıklıkla rahatsız etti?</p>
        <?php foreach ($questions as $i => $q): ?>
            <div class="hc-quiz-group">
                <p><?php echo ($i+1) . ". " . $q; ?></p>
                <select class="hc-ph-q">
                    <option value="0">Hiçbir zaman</option>
                    <option value="1">Birkaç gün</option>
                    <option value="2">Günlerin yarısından fazla</option>
                    <option value="3">Hemen hemen her gün</option>
                </select>
            </div>
        <?php endforeach; ?>
        <button class="hc-btn" onclick="hcPHQ9Hesapla()">Testi Bitir</button>
        <div class="hc-result" id="hc-ph-result">
            <div class="hc-result-label">Toplam Puan:</div>
            <div class="hc-result-value" id="hc-ph-val">-</div>
            <p id="hc-ph-desc" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
