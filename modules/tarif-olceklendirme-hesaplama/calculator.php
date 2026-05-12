<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarif_olceklendirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-recipe-scale-js',
        HC_PLUGIN_URL . 'modules/tarif-olceklendirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-recipe-scale-css',
        HC_PLUGIN_URL . 'modules/tarif-olceklendirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-recipe-scale">
        <h3>Tarif Ölçeklendirici</h3>
        
        <div class="hc-row">
            <div class="hc-form-group">
                <label>Orijinal Porsiyon</label>
                <input type="number" id="hc-rs-orig" value="4" min="1">
            </div>
            <div class="hc-form-group">
                <label>Hedef Porsiyon</label>
                <input type="number" id="hc-rs-target" value="6" min="1">
            </div>
        </div>

        <table id="hc-rs-table">
            <thead>
                <tr>
                    <th>Malzeme</th>
                    <th>Miktar</th>
                    <th>Yeni Miktar</th>
                </tr>
            </thead>
            <tbody id="hc-rs-body">
                <tr>
                    <td><input type="text" placeholder="Örn: Süt"></td>
                    <td><input type="number" class="hc-rs-qty" value="500" step="1"></td>
                    <td class="hc-rs-row-res">-</td>
                </tr>
            </tbody>
        </table>

        <div class="hc-actions">
            <button class="hc-btn-alt" onclick="hcAddScaleRow()">+ Malzeme Ekle</button>
            <button class="hc-btn" onclick="hcRecipeScaleHesapla()">Ölçeklendir</button>
        </div>
    </div>
    <?php
}
