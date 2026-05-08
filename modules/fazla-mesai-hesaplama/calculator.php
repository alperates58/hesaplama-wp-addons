<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fazla_mesai_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fazla-mesai-hesaplama',
        HC_PLUGIN_URL . 'modules/fazla-mesai-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fazla-mesai-css',
        HC_PLUGIN_URL . 'modules/fazla-mesai-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fazla-mesai-hesaplama">
        <h3>Fazla Mesai Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fm-salary">Brüt Maaş (TL)</label>
            <input type="number" id="hc-fm-salary" placeholder="Aylık Brüt Maaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-fm-hours">Fazla Mesai Saati (Saat)</label>
            <input type="number" id="hc-fm-hours" placeholder="Örn: 10">
        </div>

        <div class="hc-form-group">
            <label for="hc-fm-rate">Mesai Oranı</label>
            <select id="hc-fm-rate">
                <option value="1.5">%50 Zamlı (Normal Fazla Mesai)</option>
                <option value="2">%100 Zamlı (Hafta Tatili)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcFazlaMesaiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-fazla-mesai-result">
            <div class="hc-result-item">
                <span>Saatlik Brüt Ücret:</span>
                <strong id="hc-fm-res-hourly">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Mesai Saat Ücreti:</span>
                <strong id="hc-fm-res-fm-hourly">-</strong>
            </div>
            <div class="hc-result-value" id="hc-fm-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Brüt Mesai Ücreti</p>
        </div>
    </div>
    <?php
}
