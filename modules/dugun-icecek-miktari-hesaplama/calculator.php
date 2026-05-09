<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dugun_icecek_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wedding-drink',
        HC_PLUGIN_URL . 'modules/dugun-icecek-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wedding-drink-css',
        HC_PLUGIN_URL . 'modules/dugun-icecek-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wedding-drink">
        <h3>Düğün İçecek Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-wd-people">Davetli Sayısı</label>
            <input type="number" id="hc-wd-people" value="100" min="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-wd-type">İçecek Paketi</label>
            <select id="hc-wd-type">
                <option value="none">Sadece Alkolsüz</option>
                <option value="standard">Standart Alkol (Bira/Şarap)</option>
                <option value="full">Tam Bar (Viski/Rakı dahil)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcWeddingDrinkHesapla()">İhtiyacı Gör</button>
        <div class="hc-result" id="hc-wedding-drink-result">
            <div class="hc-wd-grid">
                <div class="hc-wd-item"> <span>Su:</span> <b id="hc-res-wd-water">0 L</b> </div>
                <div class="hc-wd-item"> <span>Meşrubat:</span> <b id="hc-res-wd-soda">0 L</b> </div>
                <div id="hc-wd-alc-fields" style="display: contents;">
                    <div class="hc-wd-item"> <span>Bira (50cl):</span> <b id="hc-res-wd-beer">0 Adet</b> </div>
                    <div class="hc-wd-item"> <span>Şarap (75cl):</span> <b id="hc-res-wd-wine">0 Şişe</b> </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
