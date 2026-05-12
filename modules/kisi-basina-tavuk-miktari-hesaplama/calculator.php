<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_tavuk_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-chicken-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-basina-tavuk-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-chicken-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-basina-tavuk-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-chicken-per-person">
        <h3>Kişi Başına Tavuk Miktarı</h3>
        
        <div class="hc-form-group">
            <label for="hc-tpp-count">Kişi Sayısı</label>
            <input type="number" id="hc-tpp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-tpp-type">Tavuk Türü</label>
            <select id="hc-tpp-type">
                <option value="175">Tavuk Göğsü (175g)</option>
                <option value="225">Tavuk But (Kemikli) (225g)</option>
                <option value="400">Bütün Tavuk (400g)</option>
                <option value="150">Tavuk Kanat (150g)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcTavukMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-chicken-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Tavuk:</span>
                <strong class="hc-result-value" id="hc-tpp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama çiğ ağırlık baz alınarak yapılmıştır.</div>
        </div>
    </div>
    <?php
}
