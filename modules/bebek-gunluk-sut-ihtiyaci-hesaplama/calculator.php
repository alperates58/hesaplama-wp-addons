<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_gunluk_sut_ihtiyaci( $atts ) {
    wp_enqueue_script(
        'hc-bebek-sut',
        HC_PLUGIN_URL . 'modules/bebek-gunluk-sut-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-sut">
        <h3>Bebek Günlük Süt İhtiyacı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bsi-kilo">Bebeğin Ağırlığı (kg)</label>
            <input type="number" id="hc-bsi-kilo" placeholder="Örn: 6" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcBebekSutHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bebek-sut-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">24 Saatlik Toplam İhtiyaç</span>
                <div class="hc-result-value" id="hc-res-bsi-toplam">-</div>
            </div>
        </div>
    </div>
    <?php
}
