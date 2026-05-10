<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iki_terimlinin_karesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-binomial-sq',
        HC_PLUGIN_URL . 'modules/iki-terimlinin-karesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-binomial-sq-css',
        HC_PLUGIN_URL . 'modules/iki-terimlinin-karesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-binomial">
        <h3>İki Terimlinin Karesi</h3>
        <div class="hc-form-group">
            <label for="hc-bs-a">1. Terim (a):</label>
            <input type="number" id="hc-bs-a" step="any" placeholder="örn: 5">
        </div>
        <div class="hc-form-group">
            <label for="hc-bs-sign">İşlem:</label>
            <select id="hc-bs-sign">
                <option value="plus">(a + b)²</option>
                <option value="minus">(a - b)²</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-bs-b">2. Terim (b):</label>
            <input type="number" id="hc-bs-b" step="any" placeholder="örn: 3">
        </div>
        <button class="hc-btn" onclick="hcBinomialSqHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-binomial-result">
            <strong>Sonuç:</strong>
            <div id="hc-bs-res-val" class="hc-result-value">-</div>
            <div id="hc-bs-res-step" style="margin-top:10px; font-size:0.9rem; font-style:italic;"></div>
        </div>
    </div>
    <?php
}
