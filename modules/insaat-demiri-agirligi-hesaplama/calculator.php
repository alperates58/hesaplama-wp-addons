<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_insaat_demiri_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rebar-weight',
        HC_PLUGIN_URL . 'modules/insaat-demiri-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rebar-weight-css',
        HC_PLUGIN_URL . 'modules/insaat-demiri-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rebar">
        <h3>İnşaat Demiri Ağırlık Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-rb-diam">Demir Çapı (Ø - mm):</label>
            <select id="hc-rb-diam">
                <option value="8">Ø 8 mm</option>
                <option value="10">Ø 10 mm</option>
                <option value="12" selected>Ø 12 mm</option>
                <option value="14">Ø 14 mm</option>
                <option value="16">Ø 16 mm</option>
                <option value="18">Ø 18 mm</option>
                <option value="20">Ø 20 mm</option>
                <option value="22">Ø 22 mm</option>
                <option value="25">Ø 25 mm</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-rb-len">Toplam Uzunluk (m):</label>
            <input type="number" id="hc-rb-len" step="0.1" placeholder="12.0">
        </div>
        <button class="hc-btn" onclick="hcRebarWeightHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rebar-result">
            <strong>Toplam Ağırlık:</strong>
            <div id="hc-rb-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
            <p id="hc-rb-res-unit" style="margin-top:10px; font-size:0.85rem; color:var(--hc-primary);"></p>
        </div>
    </div>
    <?php
}
