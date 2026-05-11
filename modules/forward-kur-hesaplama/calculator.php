<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_forward_kur_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-forward-kur-hesaplama',
        HC_PLUGIN_URL . 'modules/forward-kur-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-forward-kur-hesaplama-css',
        HC_PLUGIN_URL . 'modules/forward-kur-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-forward-kur">
        <h3>Forward Kur Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fk-spot">Güncel Spot Kur (Örn: USD/TRY)</label>
            <input type="number" id="hc-fk-spot" placeholder="Örn: 32.50" step="0.0001">
        </div>
        <div class="hc-form-group">
            <label for="hc-fk-rd">Yıllık Yerel Faiz Oranı (TRY %)</label>
            <input type="number" id="hc-fk-rd" placeholder="Örn: 45">
        </div>
        <div class="hc-form-group">
            <label for="hc-fk-rf">Yıllık Yabancı Faiz Oranı (USD %)</label>
            <input type="number" id="hc-fk-rf" placeholder="Örn: 5">
        </div>
        <div class="hc-form-group">
            <label for="hc-fk-days">Vade (Gün)</label>
            <input type="number" id="hc-fk-days" placeholder="Örn: 180">
        </div>
        <button class="hc-btn" onclick="hcForwardKurHesapla()">Forward Kur Hesapla</button>
        <div class="hc-result" id="hc-fk-result">
            <div class="hc-result-item">
                <span>Tahmini Forward Kur:</span>
                <strong class="hc-result-value" id="hc-fk-value">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Forward Puanı:</span>
                <strong id="hc-fk-points">-</strong>
            </div>
            <p class="hc-small-text">Forward kur, faiz paritesi teorisine göre hesaplanmıştır.</p>
        </div>
    </div>
    <?php
}
