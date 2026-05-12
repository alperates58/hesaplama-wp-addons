<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_protein_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-protein-cost-js',
        HC_PLUGIN_URL . 'modules/protein-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-protein-cost-css',
        HC_PLUGIN_URL . 'modules/protein-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-protein-cost">
        <h3>Protein Maliyet Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pr-price">Ürün Fiyatı (₺)</label>
            <input type="number" id="hc-pr-price" value="200" step="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-pr-weight">Ürün Ağırlığı (Gram)</label>
            <input type="number" id="hc-pr-weight" value="1000" step="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-pr-type">Ürün Türü (Protein %)</label>
            <select id="hc-pr-type">
                <option value="23">Tavuk Göğsü (%23)</option>
                <option value="20">Dana Eti (%20)</option>
                <option value="13">Yumurta (%13)</option>
                <option value="25">Mercimek (Kuru %25)</option>
                <option value="80">Protein Tozu (%80)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcProteinMaliyetHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-protein-cost-result">
            <div class="hc-result-item">
                <span>1g Protein Maliyeti:</span>
                <strong class="hc-result-value" id="hc-pr-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama, ürünün toplam protein içeriğine göre birim maliyeti gösterir.</div>
        </div>
    </div>
    <?php
}
