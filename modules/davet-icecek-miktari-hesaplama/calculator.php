<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_davet_icecek_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-party-drink',
        HC_PLUGIN_URL . 'modules/davet-icecek-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-party-drink-css',
        HC_PLUGIN_URL . 'modules/davet-icecek-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-party-drink">
        <h3>Davet İçecek Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-pd-people">Kişi Sayısı</label>
            <input type="number" id="hc-pd-people" value="10" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pd-duration">Süre (Saat)</label>
            <input type="number" id="hc-pd-duration" value="3" min="1">
        </div>
        <button class="hc-btn" onclick="hcPartyDrinkHesapla()">İhtiyacı Hesapla</button>
        <div class="hc-result" id="hc-party-drink-result">
            <div class="hc-result-item"> <span>Su:</span> <b id="hc-res-pd-water">0 L</b> </div>
            <div class="hc-result-item"> <span>Meşrubat:</span> <b id="hc-res-pd-soda">0 L</b> </div>
            <div class="hc-result-item"> <span>Çay/Kahve:</span> <b id="hc-res-pd-hot">0 Fincan</b> </div>
        </div>
    </div>
    <?php
}
