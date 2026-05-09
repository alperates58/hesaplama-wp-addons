<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_et_tuketimi_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-meat-co2',
        HC_PLUGIN_URL . 'modules/et-tuketimi-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-meat-co2-css',
        HC_PLUGIN_URL . 'modules/et-tuketimi-karbon-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-meat-co2">
        <h3>Et Tüketimi Karbon Ayak İzi</h3>
        <div class="hc-form-group">
            <label for="hc-meat-type">Et Türü</label>
            <select id="hc-meat-type">
                <option value="beef">Sığır Eti (Dana)</option>
                <option value="lamb">Kuzu / Koyun Eti</option>
                <option value="chicken">Tavuk / Kümes Hayvanları</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-meat-weight">Haftalık Tüketim (kg)</label>
            <input type="number" id="hc-meat-weight" placeholder="Örn: 1.5" min="0.1" step="0.1" value="1">
        </div>
        <button class="hc-btn" onclick="hcEtCO2Hesapla()">Hesapla</button>
        <div class="hc-result" id="hc-meat-co2-result">
            <div class="hc-result-item">
                <span>Yıllık Karbon Ayak İzi:</span>
                <span class="hc-result-value" id="hc-res-meat-co2">0 kg</span>
            </div>
            <div class="hc-meat-info">
                <p id="hc-res-meat-equiv">Bu miktar bir otomobille yaklaşık 0 km yol yapmaya eşittir.</p>
            </div>
        </div>
    </div>
    <?php
}
