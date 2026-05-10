<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_deck_kaplama_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-deck-calc',
        HC_PLUGIN_URL . 'modules/deck-kaplama-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-deck-calc-css',
        HC_PLUGIN_URL . 'modules/deck-kaplama-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-deck">
        <h3>Deck Kaplama Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dc-area">Toplam Alan (m²):</label>
            <input type="number" id="hc-dc-area" step="0.1" placeholder="20.0">
        </div>
        <div class="hc-dc-row">
            <div class="hc-form-group">
                <label>Deck Tahtası Genişliği (cm):</label>
                <input type="number" id="hc-dc-width" value="14.0">
            </div>
            <div class="hc-form-group">
                <label>Boşluk / Derz (mm):</label>
                <input type="number" id="hc-dc-gap" value="5">
            </div>
        </div>
        <button class="hc-btn" onclick="hcDeckCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-deck-result">
            <strong>Gereken Toplam Malzeme:</strong>
            <div id="hc-dc-res-val" class="hc-result-value">-</div>
            <span>Lineer Metre</span>
            <p style="margin-top:10px; font-size:0.8rem;">%10 fire payı eklenmiştir.</p>
        </div>
    </div>
    <?php
}
