<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dugun_butcesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dugun-butcesi-hesaplama',
        HC_PLUGIN_URL . 'modules/dugun-butcesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dugun-butcesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dugun-butcesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wedding">
        <h3>Düğün Bütçesi Planlayıcı</h3>
        <div class="hc-wedding-list">
            <div class="hc-form-group">
                <label>Mekan ve Yemek (₺)</label>
                <input type="number" class="hc-wed-item" placeholder="Örn: 150000">
            </div>
            <div class="hc-form-group">
                <label>Gelinlik ve Damatlık (₺)</label>
                <input type="number" class="hc-wed-item" placeholder="Örn: 40000">
            </div>
            <div class="hc-form-group">
                <label>Fotoğraf ve Video (₺)</label>
                <input type="number" class="hc-wed-item" placeholder="Örn: 20000">
            </div>
            <div class="hc-form-group">
                <label>Takılar ve Yüzükler (₺)</label>
                <input type="number" class="hc-wed-item" placeholder="Örn: 100000">
            </div>
            <div class="hc-form-group">
                <label>Diğer (Davetiye, Çiçek vb.) (₺)</label>
                <input type="number" class="hc-wed-item" placeholder="Örn: 15000">
            </div>
        </div>
        <button class="hc-btn" onclick="hcDüğünBütçesiHesapla()">Toplamı Hesapla</button>
        <div class="hc-result" id="hc-wed-result">
            <div class="hc-result-label">Toplam Tahmini Bütçe:</div>
            <div class="hc-result-value" id="hc-wed-val">-</div>
        </div>
    </div>
    <?php
}
