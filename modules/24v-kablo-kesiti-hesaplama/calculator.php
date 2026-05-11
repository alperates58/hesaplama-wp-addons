<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_24v_kablo_kesiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-24v-kablo-kesiti',
        HC_PLUGIN_URL . 'modules/24v-kablo-kesiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-24v-kablo-kesiti-css',
        HC_PLUGIN_URL . 'modules/24v-kablo-kesiti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-24v-kablo-kesiti">
        <h3>24V Kablo Kesiti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-24v-akim">Akım (I)</label>
            <input type="number" id="hc-24v-akim" placeholder="Amper (A)" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-24v-mesafe">Kablo Mesafesi (L)</label>
            <input type="number" id="hc-24v-mesafe" placeholder="Metre (m)" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-24v-kayip">İzin Verilen Gerilim Düşümü (%)</label>
            <select id="hc-24v-kayip">
                <option value="1">1% (Kritik)</option>
                <option value="3" selected>3% (Önerilen)</option>
                <option value="5">5% (Maksimum)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hc24VKabloKesitiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-24v-result">
            <div class="hc-result-item">
                <span>Önerilen Kesit:</span>
                <strong class="hc-result-value" id="hc-24v-res-section">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gerilim Kaybı:</span>
                <span id="hc-24v-res-drop">-</span>
            </div>
            <div class="hc-result-note" id="hc-24v-res-note"></div>
        </div>
    </div>
    <?php
}
