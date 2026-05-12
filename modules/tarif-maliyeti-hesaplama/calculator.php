<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarif_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-recipe-cost-js',
        HC_PLUGIN_URL . 'modules/tarif-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-recipe-cost-css',
        HC_PLUGIN_URL . 'modules/tarif-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-recipe-cost">
        <h3>Tarif Maliyet Hesaplayıcı</h3>
        
        <table id="hc-rc-table">
            <thead>
                <tr>
                    <th>Malzeme</th>
                    <th>Miktar</th>
                    <th>Birim Fiyat (₺)</th>
                    <th>Tutar</th>
                </tr>
            </thead>
            <tbody id="hc-rc-body">
                <tr>
                    <td><input type="text" placeholder="Örn: Un"></td>
                    <td><input type="number" class="hc-rc-qty" value="1" step="0.1"></td>
                    <td><input type="number" class="hc-rc-price" value="20" step="0.5"></td>
                    <td class="hc-rc-row-total">20,00 ₺</td>
                </tr>
            </tbody>
        </table>

        <div class="hc-actions">
            <button class="hc-btn-alt" onclick="hcAddRecipeRow()">+ Malzeme Ekle</button>
            <button class="hc-btn" onclick="hcRecipeCostHesapla()">Maliyeti Hesapla</button>
        </div>

        <div class="hc-result" id="hc-recipe-cost-result">
            <div class="hc-result-item">
                <span>Toplam Tarif Maliyeti:</span>
                <strong class="hc-result-value" id="hc-rc-res-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
