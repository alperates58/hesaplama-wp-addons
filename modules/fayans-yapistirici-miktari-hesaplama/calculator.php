<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fayans_yapistirici_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tile-adhesive',
        HC_PLUGIN_URL . 'modules/fayans-yapistirici-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tile-adhesive-css',
        HC_PLUGIN_URL . 'modules/fayans-yapistirici-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tile-adhesive">
        <h3>Fayans Yapıştırıcı Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-ta-area">Toplam Alan (m²):</label>
            <input type="number" id="hc-ta-area" step="0.1" placeholder="20.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ta-notch">Tarak Boyutu / Uygulama Kalınlığı:</label>
            <select id="hc-ta-notch">
                <option value="3.5">Küçük Fayanslar (6mm tarak ~3.5 kg/m²)</option>
                <option value="5.0" selected>Orta Boy (8mm tarak ~5.0 kg/m²)</option>
                <option value="6.5">Büyük Boy (10mm tarak ~6.5 kg/m²)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTileAdhesiveHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tile-adhesive-result">
            <strong>Gereken Toplam Yapıştırıcı:</strong>
            <div id="hc-ta-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
            <p id="hc-ta-res-bags" style="margin-top:10px; font-weight:bold; color:var(--hc-primary);"></p>
        </div>
    </div>
    <?php
}
