<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_altin_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gold-weight',
        HC_PLUGIN_URL . 'modules/altin-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gold-weight-css',
        HC_PLUGIN_URL . 'modules/altin-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gold-weight">
        <h3>Altın Ağırlığı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gold-ayar">Altın Ayarı</label>
            <select id="hc-gold-ayar">
                <option value="24">24 Ayar (Saf Altın)</option>
                <option value="22">22 Ayar</option>
                <option value="18">18 Ayar</option>
                <option value="14">14 Ayar</option>
                <option value="8">8 Ayar</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-gold-hacim">Hacim (cm³)</label>
            <input type="number" id="hc-gold-hacim" placeholder="Örn: 2" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcAltinAgirligiHesapla()">Ağırlığı Hesapla</button>

        <div class="hc-result" id="hc-gold-result">
            <div class="hc-result-item">
                <span>Tahmini Ağırlık:</span>
                <strong class="hc-result-value" id="hc-gold-res-gram">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Saf Altın Miktarı:</span>
                <span id="hc-gold-res-pure">-</span>
            </div>
            <div class="hc-result-note" id="hc-gold-res-note"></div>
        </div>
    </div>
    <?php
}
