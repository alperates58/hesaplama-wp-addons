<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_konut_kredisi_faiz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-konut-kredisi-faiz-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/konut-kredisi-faiz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-konut-kredisi-faiz-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/konut-kredisi-faiz-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-konut-kredisi-faiz-orani">
        <h3>Konut Kredisi Faiz Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kkfo-amount">Kredi Tutarı (₺)</label>
            <input type="number" id="hc-kkfo-amount" placeholder="Örn: 2.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkfo-installment">Aylık Taksit Tutarı (₺)</label>
            <input type="number" id="hc-kkfo-installment" placeholder="Örn: 55.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkfo-term">Vade (Ay)</label>
            <input type="number" id="hc-kkfo-term" placeholder="Örn: 120">
        </div>
        <button class="hc-btn" onclick="hcKonutKredisiFaizOraniHesapla()">Oranı Bul</button>
        <div class="hc-result" id="hc-kkfo-result">
            <p>Tahmini Aylık Faiz Oranı:</p>
            <div class="hc-result-value" id="hc-kkfo-value">-</div>
            <p class="hc-small-text">Verilen taksit ve vadeye göre matematiksel olarak hesaplanan yaklaşık aylık kredi faiz oranıdır.</p>
        </div>
    </div>
    <?php
}
