<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dondurma_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ice-cream',
        HC_PLUGIN_URL . 'modules/dondurma-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ice-cream-css',
        HC_PLUGIN_URL . 'modules/dondurma-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ice-cream">
        <h3>Dondurma Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-ic-people">Kişi Sayısı</label>
            <input type="number" id="hc-ic-people" value="5" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ic-portion">Porsiyon Başına Top (Adet)</label>
            <input type="number" id="hc-ic-portion" value="2" min="1">
        </div>
        <button class="hc-btn" onclick="hcIceCreamHesapla()">Miktarı Hesapla</button>
        <div class="hc-result" id="hc-ice-cream-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Ağırlık:</span>
                <span class="hc-result-value" id="hc-res-ic-weight">0 gr</span>
            </div>
            <p class="hc-ic-note">Bir standart dondurma topu yaklaşık 50-60 gramdır.</p>
        </div>
    </div>
    <?php
}
