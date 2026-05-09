<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fermantasyon_sekeri_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ferm-sugar',
        HC_PLUGIN_URL . 'modules/fermantasyon-sekeri-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ferm-sugar-css',
        HC_PLUGIN_URL . 'modules/fermantasyon-sekeri-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ferm-sugar">
        <h3>Şişeleme Şekeri</h3>
        <div class="hc-form-group">
            <label for="hc-fs-vol">Sıvı Miktarı (Litre)</label>
            <input type="number" id="hc-fs-vol" value="20" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-fs-carb">Hedef Gazlılık (CO2 Hacmi)</label>
            <select id="hc-fs-carb">
                <option value="2.0">Düşük (2.0)</option>
                <option value="2.4" selected>Orta (2.4)</option>
                <option value="2.8">Yüksek (2.8)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcFermSugarHesapla()">Şeker Miktarını Gör</button>
        <div class="hc-result" id="hc-ferm-sugar-result">
            <div class="hc-result-item">
                <span>Toplam Şeker:</span>
                <span class="hc-result-value" id="hc-res-fs-total">0 gr</span>
            </div>
            <p class="hc-fs-note">Örnek: Standart bir bira için 2.4 CO2 hacmi idealdir. Sofra şekeri (sakkaroz) baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
