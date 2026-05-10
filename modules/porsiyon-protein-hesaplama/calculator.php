<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_porsiyon_protein_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-port-prot',
        HC_PLUGIN_URL . 'modules/porsiyon-protein-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-port-prot-calc">
        <h3>Protein Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-pp-type">Gıda Grubu:</label>
            <select id="hc-pp-type">
                <option value="25">Kırmızı Et / Tavuk (100g -> 25g)</option>
                <option value="20">Balık (100g -> 20g)</option>
                <option value="13">Yumurta (100g -> 13g)</option>
                <option value="8">Baklagil (Haşlanmış) (100g -> 8g)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-pp-weight">Miktar (Gram):</label>
            <input type="number" id="hc-pp-weight" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcPortProtHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-porsiyon-protein-result">
            <strong>Toplam Protein:</strong>
            <div id="hc-pp-res" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
