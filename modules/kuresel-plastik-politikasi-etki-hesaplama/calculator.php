<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kuresel_plastik_politikasi_etki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kuresel-plastik-politikasi-etki-hesaplama',
        HC_PLUGIN_URL . 'modules/kuresel-plastik-politikasi-etki-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kuresel-plastik-politikasi-etki-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kuresel-plastik-politikasi-etki-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-plastic-policy">
        <h3>Plastik Politikası Etki Simülatörü</h3>
        <div class="hc-form-group">
            <label for="hc-pp-pop">Etkilenen Nüfus (Milyon)</label>
            <input type="number" id="hc-pp-pop" value="85">
        </div>
        <div class="hc-form-group">
            <label for="hc-pp-reduction">Politika Kapsamı (Azaltma Oranı %)</label>
            <input type="range" id="hc-pp-reduction" min="0" max="100" value="30" oninput="document.getElementById('hc-pp-val-out').innerText = this.value + '%'">
            <span id="hc-pp-val-out">30%</span>
        </div>
        <button class="hc-btn" onclick="hcKüreselPlastikPolitikasıEtkiHesapla()">Etkiyi Gör</button>
        <div class="hc-result" id="hc-pp-result">
            <div id="hc-pp-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
