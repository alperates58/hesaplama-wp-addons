<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_deck_ahsap_koruyucu_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-deck-oil',
        HC_PLUGIN_URL . 'modules/deck-ahsap-koruyucu-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-deck-oil-css',
        HC_PLUGIN_URL . 'modules/deck-ahsap-koruyucu-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-deck-oil">
        <h3>Ahşap Koruyucu / Yağ Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-do-area">Toplam Deck Alanı (m²):</label>
            <input type="number" id="hc-do-area" step="0.1" placeholder="20.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-do-type">Ahşap Türü (Emicilik):</label>
            <select id="hc-do-type">
                <option value="12">Yumuşak Ahşap (Çam vb. ~12 m²/L)</option>
                <option value="15" selected>Sert Ahşap (Teak, Iroko vb. ~15 m²/L)</option>
                <option value="10">Eski / Kurumuş Ahşap (~10 m²/L)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-do-coats">Kat Sayısı:</label>
            <input type="number" id="hc-do-coats" value="2" min="1">
        </div>
        <button class="hc-btn" onclick="hcDeckOilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-deck-oil-result">
            <strong>Gereken Toplam Yağ:</strong>
            <div id="hc-do-res-val" class="hc-result-value">-</div>
            <span>Litre (L)</span>
        </div>
    </div>
    <?php
}
