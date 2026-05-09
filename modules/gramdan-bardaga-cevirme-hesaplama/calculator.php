<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gramdan_bardaga_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gram-to-cup',
        HC_PLUGIN_URL . 'modules/gramdan-bardaga-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gram-to-cup-css',
        HC_PLUGIN_URL . 'modules/gramdan-bardaga-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gram-to-cup">
        <h3>Gramdan Bardağa Çevir</h3>
        <div class="hc-form-group">
            <label for="hc-gc-material">Malzeme</label>
            <select id="hc-gc-material">
                <option value="water">Su</option>
                <option value="flour">Un</option>
                <option value="sugar">Toz Şeker</option>
                <option value="oil">Sıvı Yağ</option>
                <option value="rice">Pirinç</option>
                <option value="milk">Süt</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-gc-grams">Ağırlık (gr)</label>
            <input type="number" id="hc-gc-grams" value="100" min="1">
        </div>
        <button class="hc-btn" onclick="hcGramToCupHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gram-to-cup-result">
            <div class="hc-result-item">
                <span>Bardak Karşılığı:</span>
                <span class="hc-result-value" id="hc-res-gc-cup">0 Bardak</span>
            </div>
            <p class="hc-gc-note">Standart 200 ml'lik su bardağı baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
