<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_gunluk_mama_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-gunluk-mama',
        HC_PLUGIN_URL . 'modules/bebek-gunluk-mama-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-gunluk-mama">
        <h3>Bebek Günlük Mama Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bgm-kilo">Bebeğin Ağırlığı (kg)</label>
            <input type="number" id="hc-bgm-kilo" placeholder="Örn: 6.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcBebekGunlukMamaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bebek-gunluk-mama-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">Günlük Toplam Mama İhtiyacı</span>
                <div class="hc-result-value" id="hc-res-bgm-toplam">-</div>
            </div>
        </div>
    </div>
    <?php
}
