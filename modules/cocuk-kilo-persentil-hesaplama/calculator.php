<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuk_kilo_persentil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cocuk-kilo-p',
        HC_PLUGIN_URL . 'modules/cocuk-kilo-persentil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cocuk-kilo-p">
        <h3>Çocuk Kilo Persentil Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ckp-cinsiyet">Cinsiyet</label>
            <select id="hc-ckp-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kız</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ckp-yas">Yaş (2-18)</label>
            <input type="number" id="hc-ckp-yas" placeholder="Örn: 10" min="2" max="18">
        </div>
        <div class="hc-form-group">
            <label for="hc-ckp-kilo">Kilo (kg)</label>
            <input type="number" id="hc-ckp-kilo" placeholder="Örn: 30" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcCocukKiloPersentilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cocuk-kilo-p-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">Kilo Persentili</span>
                <div class="hc-result-value" id="hc-res-ckp-p">-</div>
            </div>
        </div>
    </div>
    <?php
}
