<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuk_boy_persentil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cocuk-boy-p',
        HC_PLUGIN_URL . 'modules/cocuk-boy-persentil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cocuk-boy-p">
        <h3>Çocuk Boy Persentil Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cbp-cinsiyet">Cinsiyet</label>
            <select id="hc-cbp-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kız</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-cbp-yas">Yaş (2-18)</label>
            <input type="number" id="hc-cbp-yas" placeholder="Örn: 8" min="2" max="18">
        </div>
        <div class="hc-form-group">
            <label for="hc-cbp-boy">Boy (cm)</label>
            <input type="number" id="hc-cbp-boy" placeholder="Örn: 130" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcCocukBoyPersentilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cocuk-boy-p-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">Boy Persentili</span>
                <div class="hc-result-value" id="hc-res-cbp-p">-</div>
            </div>
        </div>
    </div>
    <?php
}
