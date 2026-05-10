<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_golf_handikap_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-golf-handicap',
        HC_PLUGIN_URL . 'modules/golf-handikap-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-golf-handicap-css',
        HC_PLUGIN_URL . 'modules/golf-handikap-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-golf-handicap">
        <h3>Golf Handikap Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-gh-score">Toplam Skorunuz:</label>
            <input type="number" id="hc-gh-score" placeholder="85">
        </div>
        <div class="hc-form-group">
            <label for="hc-gh-rating">Saha Derecesi (Course Rating):</label>
            <input type="number" id="hc-gh-rating" step="0.1" placeholder="72.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-gh-slope">Saha Eğim Derecesi (Slope Rating):</label>
            <input type="number" id="hc-gh-slope" placeholder="113">
            <small>Standart saha eğimi 113'tür.</small>
        </div>
        <button class="hc-btn" onclick="hcGolfHandicapHesapla()">Handikapı Hesapla</button>
        <div class="hc-result" id="hc-golf-handicap-result">
            <strong>Tahmini Handikap Farkı:</strong>
            <div id="hc-gh-res-val" class="hc-result-value">-</div>
            <p style="margin-top:10px; font-size:0.8rem;">Bu tek turdaki performansınızdır. İndeks için son 20 turun ortalaması gerekir.</p>
        </div>
    </div>
    <?php
}
