<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_is_ve_guc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-is-ve-guc-hesaplama',
        HC_PLUGIN_URL . 'modules/is-ve-guc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-is-ve-guc-hesaplama-css',
        HC_PLUGIN_URL . 'modules/is-ve-guc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-is-ve-guc-hesaplama">
        <h3>İş ve Güç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ivg-kuvvet">Uygulanan Kuvvet (F - Newton)</label>
            <input type="number" step="any" id="hc-ivg-kuvvet" value="50" placeholder="Kuvvet N" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ivg-yol">Mesafe / Yol (d - metre)</label>
            <input type="number" step="any" id="hc-ivg-yol" value="10" placeholder="Mesafe m" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ivg-aci">Kuvvet ile Hareket Doğrultusu Arasındaki Açı (° Derece)</label>
            <input type="number" step="any" id="hc-ivg-aci" value="0" placeholder="Doğrusal hareket için 0" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ivg-sure">Geçen Süre (t - saniye)</label>
            <input type="number" step="any" id="hc-ivg-sure" value="5" placeholder="Süre saniye" required>
        </div>
        
        <button class="hc-btn" onclick="hcIsVeGucHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-is-ve-guc-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
