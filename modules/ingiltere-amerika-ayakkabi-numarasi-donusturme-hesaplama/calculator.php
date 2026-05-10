<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ingiltere_amerika_ayakkabi_numarasi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ingiltere-amerika-ayakkabi-numarasi-donusturme-hesaplama',
        HC_PLUGIN_URL . 'modules/ingiltere-amerika-ayakkabi-numarasi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ingiltere-amerika-ayakkabi-numarasi-donusturme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ingiltere-amerika-ayakkabi-numarasi-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-shoe-ukus">
        <h3>UK / US Ayakkabı Numarası Dönüştür</h3>
        <div class="hc-form-group">
            <label for="hc-su-gender">Cinsiyet</label>
            <select id="hc-su-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-su-from">Kaynak Sistem</label>
            <select id="hc-su-from">
                <option value="UK">İngiltere (UK)</option>
                <option value="US">Amerika (US)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-su-val">Numara</label>
            <input type="number" id="hc-su-val" step="0.5" placeholder="Örn: 8.5">
        </div>
        <button class="hc-btn" onclick="hcİngiltereAmerikaAyakkabıNumarasıDönüştürmeHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-su-result">
            <div class="hc-result-label">Türkiye (EU) Karşılığı:</div>
            <div class="hc-result-value" id="hc-su-res">-</div>
        </div>
    </div>
    <?php
}
