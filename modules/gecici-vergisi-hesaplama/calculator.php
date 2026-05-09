<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gecici_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gecici-vergi',
        HC_PLUGIN_URL . 'modules/gecici-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gecici-vergi-css',
        HC_PLUGIN_URL . 'modules/gecici-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gecici-vergisi-hesaplama">
        <h3>Geçici Vergi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gv-profit">Dönem Karı (TL)</label>
            <input type="number" id="hc-gv-profit" placeholder="Üç aylık ticari kar">
        </div>

        <div class="hc-form-group">
            <label for="hc-gv-rate">Vergi Oranı (%)</label>
            <select id="hc-gv-rate">
                <option value="25">Kurumlar Vergisi Mükellefi (%25)</option>
                <option value="15">Gelir Vergisi Mükellefi (%15-40)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcGeciciVergiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gecici-result">
            <div class="hc-result-value" id="hc-gv-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Dönemlik Ödenecek Geçici Vergi</p>
        </div>
    </div>
    <?php
}
