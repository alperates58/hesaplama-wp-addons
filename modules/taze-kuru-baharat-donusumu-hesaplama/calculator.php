<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_taze_kuru_baharat_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-herb-conv-js',
        HC_PLUGIN_URL . 'modules/taze-kuru-baharat-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-herb-conv-css',
        HC_PLUGIN_URL . 'modules/taze-kuru-baharat-donusumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-herb-conv">
        <h3>Taze - Kuru Baharat Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-hc-amount">Miktar (Örn: Kaşık, Dal)</label>
            <input type="number" id="hc-hc-amount" value="3" min="0" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-hc-from">Birim</label>
            <select id="hc-hc-from">
                <option value="fresh_to_dried">Taze → Kuru</option>
                <option value="dried_to_fresh">Kuru → Taze</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcBaharatDonustur()">Dönüştür</button>

        <div class="hc-result" id="hc-herb-conv-result">
            <div class="hc-result-item">
                <span>Dönüşüm Sonucu:</span>
                <strong class="hc-result-value" id="hc-hc-res-val">-</strong>
            </div>
            <div class="hc-result-note">Genel Kural: 3 birim taze baharat = 1 birim kuru baharat.</div>
        </div>
    </div>
    <?php
}
