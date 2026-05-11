<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bilesik_faiz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bilesik-faiz-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/bilesik-faiz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bilesik-faiz-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bilesik-faiz-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bilesik-faiz-orani">
        <h3>Bileşik Faiz Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bfor-pv">Başlangıç Tutarı (PV - ₺)</label>
            <input type="number" id="hc-bfor-pv" placeholder="Örn: 10.000" step="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-bfor-fv">Hedeflenen Tutar (FV - ₺)</label>
            <input type="number" id="hc-bfor-fv" placeholder="Örn: 20.000" step="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-bfor-time">Süre (Yıl)</label>
            <input type="number" id="hc-bfor-time" placeholder="Örn: 5" step="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-bfor-period">Bileşik Dönemi</label>
            <select id="hc-bfor-period">
                <option value="1">Yıllık</option>
                <option value="12">Aylık</option>
                <option value="4">Üç Aylık</option>
                <option value="365">Günlük</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBilesikFaizOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bfor-result">
            <p>Gereken Yıllık Bileşik Faiz Oranı:</p>
            <div class="hc-result-value" id="hc-bfor-value">-</div>
            <p class="hc-small-text">PV tutarının belirtilen sürede FV tutarına ulaşması için gereken nominal yıllık orandır.</p>
        </div>
    </div>
    <?php
}
