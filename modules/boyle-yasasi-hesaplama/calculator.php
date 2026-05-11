<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_boyle_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boyle-law',
        HC_PLUGIN_URL . 'modules/boyle-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-boyle-law">
        <h3>Boyle Yasası Hesaplama (P₁V₁ = P₂V₂)</h3>
        <p><small>Hesaplamak istediğiniz alanı boş bırakın.</small></p>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div>
                <h4>Durum 1</h4>
                <div class="hc-form-group">
                    <label>Basınç (P₁, bar)</label>
                    <input type="number" id="hc-by-p1" step="0.01">
                </div>
                <div class="hc-form-group">
                    <label>Hacim (V₁, Litre)</label>
                    <input type="number" id="hc-by-v1" step="0.1">
                </div>
            </div>
            <div>
                <h4>Durum 2</h4>
                <div class="hc-form-group">
                    <label>Basınç (P₂, bar)</label>
                    <input type="number" id="hc-by-p2" step="0.01">
                </div>
                <div class="hc-form-group">
                    <label>Hacim (V₂, Litre)</label>
                    <input type="number" id="hc-by-v2" step="0.1">
                </div>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcBoyleHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-by-result">
            <span>Hesaplanan Sonuç:</span>
            <div class="hc-result-value" id="hc-by-res-val">-</div>
        </div>
    </div>
    <?php
}
