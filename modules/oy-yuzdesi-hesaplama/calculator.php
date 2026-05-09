<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oy_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vote-percent',
        HC_PLUGIN_URL . 'modules/oy-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vote-percent-css',
        HC_PLUGIN_URL . 'modules/oy-yuzdesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vote-percent">
        <h3>Oy Yüzdesi Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-vote-target">Alınan Oy</label>
            <input type="number" id="hc-vote-target" placeholder="Örn: 25000">
        </div>
        <div class="hc-form-group">
            <label for="hc-vote-total">Toplam Geçerli Oy</label>
            <input type="number" id="hc-vote-total" placeholder="Örn: 50000">
        </div>
        <button class="hc-btn" onclick="hcVotePercentHesapla()">Yüzdeyi Hesapla</button>
        <div class="hc-result" id="hc-vote-percent-result">
            <div class="hc-result-item">
                <span>Oy Oranı:</span>
                <span class="hc-result-value" id="hc-res-vote-val">%0</span>
            </div>
            <div class="hc-vote-progress">
                <div id="hc-res-vote-bar" class="hc-progress-bar"></div>
            </div>
        </div>
    </div>
    <?php
}
