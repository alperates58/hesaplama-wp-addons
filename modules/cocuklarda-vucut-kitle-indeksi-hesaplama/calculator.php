<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuklarda_vucut_kitle_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vki-cocuk',
        HC_PLUGIN_URL . 'modules/cocuklarda-vucut-kitle-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vki-cocuk-css',
        HC_PLUGIN_URL . 'modules/cocuklarda-vucut-kitle-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vki-cocuk">
        <h3>Çocuklarda VKİ Hesaplama</h3>
        <div class="hc-form-group">
            <label>Cinsiyet:</label>
            <div style="display:flex; gap:10px;">
                <label><input type="radio" name="hc-vkc-gender" value="male" checked> Erkek</label>
                <label><input type="radio" name="hc-vkc-gender" value="female"> Kız</label>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-vkc-age">Yaş (2-19):</label>
            <input type="number" id="hc-vkc-age" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-vkc-height">Boy (cm):</label>
            <input type="number" id="hc-vkc-height" placeholder="Örn: 140">
        </div>
        <div class="hc-form-group">
            <label for="hc-vkc-weight">Kilo (kg):</label>
            <input type="number" id="hc-vkc-weight" placeholder="Örn: 35">
        </div>
        <button class="hc-btn" onclick="hcVkiCocukHesapla()">Persentil Hesapla</button>
        <div class="hc-result" id="hc-vki-cocuk-result">
            <strong>VKİ: <span id="hc-vkc-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-vkc-res-desc" style="margin-top:10px; font-weight:bold;"></div>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">Çocuklarda VKİ, yaşıtlarına göre persentil (yüzdelik dilim) ile değerlendirilir.</p>
        </div>
    </div>
    <?php
}
