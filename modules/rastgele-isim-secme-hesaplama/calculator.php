<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rastgele_isim_secme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-random-name',
        HC_PLUGIN_URL . 'modules/rastgele-isim-secme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-random-name-css',
        HC_PLUGIN_URL . 'modules/rastgele-isim-secme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-random-name">
        <h3>Rastgele İsim Seçici</h3>
        <div class="hc-form-group">
            <label for="hc-rn-list">İsim Listesi (Her satıra bir isim)</label>
            <textarea id="hc-rn-list" rows="5" placeholder="Ahmet&#10;Mehmet&#10;Ayşe..."></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-rn-count">Seçilecek Kişi Sayısı</label>
            <input type="number" id="hc-rn-count" value="1" min="1">
        </div>
        <button class="hc-btn" onclick="hcRandomNameHesapla()">Kura Çek</button>
        <div class="hc-result" id="hc-random-name-result">
            <div id="hc-res-rn-winner" class="hc-winner-box"></div>
        </div>
    </div>
    <?php
}
