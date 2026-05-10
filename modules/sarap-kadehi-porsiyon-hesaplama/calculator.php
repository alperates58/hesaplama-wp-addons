<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sarap_kadehi_porsiyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wine-glass',
        HC_PLUGIN_URL . 'modules/sarap-kadehi-porsiyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-wine-glass-calc">
        <h3>Şarap Kadehi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-wg-bottle">Şişe Hacmi (ml):</label>
            <select id="hc-wg-bottle">
                <option value="750">Standart (750 ml)</option>
                <option value="375">Yarım (375 ml)</option>
                <option value="1500">Magnum (1.5 L)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-wg-glass">Kadeh Başı Miktar (ml):</label>
            <select id="hc-wg-glass">
                <option value="125">Standart (125 ml)</option>
                <option value="150">Cömert (150 ml)</option>
                <option value="100">Tadım (100 ml)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcWineGlassHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wine-glass-result">
            <strong>Toplam Kadeh Sayısı:</strong>
            <div id="hc-wg-val" class="hc-result-value">-</div>
            <p id="hc-wg-info"></p>
        </div>
    </div>
    <?php
}
