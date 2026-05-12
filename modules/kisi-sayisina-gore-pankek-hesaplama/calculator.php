<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_pankek_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pancake-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-pankek-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pancake-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-pankek-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pancake-per-person">
        <h3>Pankek Malzemesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ppp-count">Kişi Sayısı</label>
            <input type="number" id="hc-ppp-count" value="4" min="1">
        </div>

        <button class="hc-btn" onclick="hcPankekHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pancake-per-person-result">
            <div class="hc-result-item">
                <span>Un:</span>
                <strong id="hc-ppp-res-flour">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Süt:</span>
                <strong id="hc-ppp-res-milk">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Yumurta:</span>
                <strong id="hc-ppp-res-egg">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Şeker / Yağ:</span>
                <strong id="hc-ppp-res-other">-</strong>
            </div>
        </div>
    </div>
    <?php
}
