<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hamur_tuz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dough-salt-js',
        HC_PLUGIN_URL . 'modules/hamur-tuz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dough-salt-css',
        HC_PLUGIN_URL . 'modules/hamur-tuz-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dough-salt">
        <h3>Hamur Tuz Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ds-flour">Toplam Un Miktarı (g)</label>
            <input type="number" id="hc-ds-flour" placeholder="Örn: 1000" value="1000">
        </div>

        <div class="hc-form-group">
            <label for="hc-ds-ratio">Tuz Oranı (%) - Fırıncı Yüzdesi</label>
            <input type="number" id="hc-ds-ratio" placeholder="Örn: 2" step="0.1" value="2">
        </div>

        <button class="hc-btn" onclick="hcHamurTuzHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-dough-salt-result">
            <div class="hc-result-item">
                <span>Gereken Tuz:</span>
                <strong class="hc-result-value" id="hc-ds-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-ds-note"></div>
        </div>
    </div>
    <?php
}
