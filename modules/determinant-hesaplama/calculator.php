<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_determinant_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-determinant-hesaplama', HC_PLUGIN_URL . 'modules/determinant-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-determinant-hesaplama-css', HC_PLUGIN_URL . 'modules/determinant-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-determinant-hesaplama">
        <h3>Determinant Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-det-boyut">Matris Boyutu</label>
            <select id="hc-det-boyut" onchange="hcDeterminantBoyutGuncelle()">
                <option value="2">2×2</option>
                <option value="3">3×3</option>
            </select>
        </div>
        <div id="hc-det-matris2" class="hc-det-matris">
            <p><strong>Matris elemanları:</strong></p>
            <div class="hc-det-satir"><input type="number" id="hc-det-a11" placeholder="a₁₁" step="any" /><input type="number" id="hc-det-a12" placeholder="a₁₂" step="any" /></div>
            <div class="hc-det-satir"><input type="number" id="hc-det-a21" placeholder="a₂₁" step="any" /><input type="number" id="hc-det-a22" placeholder="a₂₂" step="any" /></div>
        </div>
        <div id="hc-det-matris3" class="hc-det-matris" style="display:none;">
            <p><strong>Matris elemanları:</strong></p>
            <div class="hc-det-satir"><input type="number" id="hc-det-b11" placeholder="a₁₁" step="any" /><input type="number" id="hc-det-b12" placeholder="a₁₂" step="any" /><input type="number" id="hc-det-b13" placeholder="a₁₃" step="any" /></div>
            <div class="hc-det-satir"><input type="number" id="hc-det-b21" placeholder="a₂₁" step="any" /><input type="number" id="hc-det-b22" placeholder="a₂₂" step="any" /><input type="number" id="hc-det-b23" placeholder="a₂₃" step="any" /></div>
            <div class="hc-det-satir"><input type="number" id="hc-det-b31" placeholder="a₃₁" step="any" /><input type="number" id="hc-det-b32" placeholder="a₃₂" step="any" /><input type="number" id="hc-det-b33" placeholder="a₃₃" step="any" /></div>
        </div>
        <button class="hc-btn" onclick="hcDeterminantHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-determinant-hesaplama-result"></div>
    </div>
    <?php
}
