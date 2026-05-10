<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kozmetik_formul_olceklendirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kozmetik-formul-olceklendirme-hesaplama',
        HC_PLUGIN_URL . 'modules/kozmetik-formul-olceklendirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kozmetik-formul-olceklendirme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kozmetik-formul-olceklendirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-formula-scale">
        <h3>Formül Ölçeklendirme</h3>
        <div class="hc-form-group">
            <label for="hc-fs-source">Mevcut Toplam Miktar (Örn: 100g)</label>
            <input type="number" id="hc-fs-source" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-fs-target">Hedef Yeni Miktar (Örn: 5000g)</label>
            <input type="number" id="hc-fs-target" placeholder="Örn: 5000">
        </div>
        <hr>
        <p style="font-size:0.9em; color:#666;">Bileşenleri ve mevcut miktarlarını girin:</p>
        <div id="hc-fs-ingredients">
            <div class="hc-form-group hc-fs-row">
                <input type="text" class="hc-fs-name" placeholder="Bileşen Adı" style="width:60%">
                <input type="number" class="hc-fs-val" placeholder="Miktar" style="width:35%">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcAddFormulaIngredient()" style="margin-bottom:10px;">+ Bileşen Ekle</button>
        <button class="hc-btn" onclick="hcKozmetikFormülÖlçeklendirmeHesapla()">Yeniden Ölçeklendir</button>
        <div class="hc-result" id="hc-fs-result">
            <div id="hc-fs-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
