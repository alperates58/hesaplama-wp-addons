<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fazla_mesai_ve_nobet_ucreti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fazla-mesai-nobet',
        HC_PLUGIN_URL . 'modules/fazla-mesai-ve-nobet-ucreti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fazla-mesai-nobet-css',
        HC_PLUGIN_URL . 'modules/fazla-mesai-ve-nobet-ucreti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fazla-mesai-ve-nobet-ucreti-hesaplama">
        <h3>Fazla Mesai ve Nöbet Ücreti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fmn-salary">Brüt Maaş (TL)</label>
            <input type="number" id="hc-fmn-salary" placeholder="Aylık Brüt Maaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-fmn-fm-hours">Fazla Mesai Saati (1.5x)</label>
            <input type="number" id="hc-fmn-fm-hours" value="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-fmn-nb-hours">Nöbet Saati</label>
            <input type="number" id="hc-fmn-nb-hours" value="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-fmn-nb-rate">Nöbet Katsayısı / Oranı</label>
            <select id="hc-fmn-nb-rate">
                <option value="1.25">%25 Zamlı (Normal Nöbet)</option>
                <option value="1.50">%50 Zamlı (Vardiya)</option>
                <option value="1">Katsayısız (Normal Saatlik)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcFazlaMesaiNobetHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-fmn-result">
            <div class="hc-result-item">
                <span>Fazla Mesai Tutarı:</span>
                <strong id="hc-fmn-res-fm">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Nöbet Ücreti:</span>
                <strong id="hc-fmn-res-nb">-</strong>
            </div>
            <div class="hc-result-value" id="hc-fmn-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Ek Brüt Kazanç</p>
        </div>
    </div>
    <?php
}
