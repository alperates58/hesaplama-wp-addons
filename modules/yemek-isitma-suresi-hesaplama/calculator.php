<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yemek_isitma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-reheat-time',
        HC_PLUGIN_URL . 'modules/yemek-isitma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-reheat-calc">
        <h3>Yemek Isıtma Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-rt-type">Yemek Türü:</label>
            <select id="hc-rt-type">
                <option value="liquid">Sıvı (Çorba vb.)</option>
                <option value="solid">Katı (Pilav, Makarna vb.)</option>
                <option value="meat">Et / Tavuk (Bütün)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-rt-method">Yöntem:</label>
            <select id="hc-rt-method">
                <option value="microwave">Mikrodalga</option>
                <option value="stove">Ocak (Tencere)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcReheatTimeHesapla()">Süreyi Gör</button>
        <div class="hc-result" id="hc-reheat-result">
            <strong>Tahmini Süre:</strong>
            <div id="hc-rt-val" class="hc-result-value">-</div>
            <p id="hc-rt-info"></p>
        </div>
    </div>
    <?php
}
