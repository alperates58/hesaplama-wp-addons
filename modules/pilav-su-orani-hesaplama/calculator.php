<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pilav_su_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rice-water-js',
        HC_PLUGIN_URL . 'modules/pilav-su-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rice-water-css',
        HC_PLUGIN_URL . 'modules/pilav-su-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rice-water">
        <h3>Pilav Su Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-rw-rice">Pirinç Miktarı (Su Bardağı)</label>
            <input type="number" id="hc-rw-rice" value="2" min="0.5" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-rw-type">Pirinç Türü</label>
            <select id="hc-rw-type">
                <option value="1.5">Baldo / Osmancık (1 : 1.5)</option>
                <option value="2">Basmati (1 : 2)</option>
                <option value="1.5">Jasmine (1 : 1.5)</option>
                <option value="3">Esmer Pirinç (1 : 3)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcPilavSuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-rice-water-result">
            <div class="hc-result-item">
                <span>Gereken Su:</span>
                <strong class="hc-result-value" id="hc-rw-res-val">-</strong>
            </div>
            <div class="hc-result-note">Pirinçleri önceden ıslatırsanız su miktarını %10-15 azaltmanız önerilir.</div>
        </div>
    </div>
    <?php
}
