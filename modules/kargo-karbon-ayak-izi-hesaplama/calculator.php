<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kargo_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kargo-karbon-ayak-izi-hesaplama',
        HC_PLUGIN_URL . 'modules/kargo-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kargo-karbon-ayak-izi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kargo-karbon-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cargo">
        <h3>Kargo Karbon Ayak İzi</h3>
        <div class="hc-form-group">
            <label for="hc-cr-weight">Kargo Ağırlığı (kg)</label>
            <input type="number" id="hc-cr-weight" placeholder="Örn: 5">
        </div>
        <div class="hc-form-group">
            <label for="hc-cr-dist">Mesafe (km)</label>
            <input type="number" id="hc-cr-dist" placeholder="Örn: 500">
        </div>
        <div class="hc-form-group">
            <label for="hc-cr-mode">Taşıma Modu</label>
            <select id="hc-cr-mode">
                <option value="0.15">Karayolu (Kamyon) - 0.15 kg/ton-km</option>
                <option value="0.60">Havayolu - 0.60 kg/ton-km</option>
                <option value="0.01">Denizyolu - 0.01 kg/ton-km</option>
                <option value="0.03">Demiryolu - 0.03 kg/ton-km</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKargoKarbonAyakİziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cr-result">
            <div class="hc-result-label">Tahmini Emisyon:</div>
            <div class="hc-result-value" id="hc-cr-val">-</div>
        </div>
    </div>
    <?php
}
