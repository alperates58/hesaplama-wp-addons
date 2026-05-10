<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_molar_cozunurluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-molar-cozunurluk-hesaplama',
        HC_PLUGIN_URL . 'modules/molar-cozunurluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-molar-cozunurluk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/molar-cozunurluk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-molar-sol">
        <h3>Molar Çözünürlük Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ms-type">Tuz Tipi</label>
            <select id="hc-ms-type">
                <option value="1">AB (Örn: AgCl) - s = √Ksp</option>
                <option value="2">AB₂ / A₂B (Örn: MgF₂) - s = ∛(Ksp/4)</option>
                <option value="3">AB₃ / A₃B (Örn: Al(OH)₃) - s = ∜(Ksp/27)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ms-ksp">Ksp Değeri</label>
            <input type="text" id="hc-ms-ksp" placeholder="Örn: 1.8e-10">
        </div>
        <button class="hc-btn" onclick="hcMolarÇözünürlükHesapla()">Çözünürlüğü Hesapla</button>
        <div class="hc-result" id="hc-ms-result">
            <div class="hc-result-label">Molar Çözünürlük (s):</div>
            <div class="hc-result-value" id="hc-ms-val">-</div>
        </div>
    </div>
    <?php
}
