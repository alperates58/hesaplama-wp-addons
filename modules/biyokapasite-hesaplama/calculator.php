<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_biyokapasite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-biyokapasite',
        HC_PLUGIN_URL . 'modules/biyokapasite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-biyokapasite-css',
        HC_PLUGIN_URL . 'modules/biyokapasite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-biyokapasite">
        <h3>Biyokapasite Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bio-land-type">Arazi Türü</label>
            <select id="hc-bio-land-type">
                <option value="cropland">Tarım Arazisi</option>
                <option value="grazing">Otlatma Alanı</option>
                <option value="forest">Orman Alanı</option>
                <option value="fishing">Balıkçılık Sahası</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-bio-area">Alan (Hektar)</label>
            <input type="number" id="hc-bio-area" placeholder="Örn: 10" min="0.1" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcBiyokapasiteHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-biyokapasite-result">
            <div class="hc-result-item">
                <span>Biyokapasite:</span>
                <span class="hc-result-value" id="hc-res-biocap">0 gha</span>
            </div>
            <p id="hc-res-bio-desc">gha (Küresel Hektar), dünya ortalama verimliliğine sahip bir hektar alanı temsil eder.</p>
        </div>
    </div>
    <?php
}
