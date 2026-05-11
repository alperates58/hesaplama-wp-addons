<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_12v_kablo_kesiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-12v-kablo-kesiti',
        HC_PLUGIN_URL . 'modules/12v-kablo-kesiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-12v-kablo-kesiti-css',
        HC_PLUGIN_URL . 'modules/12v-kablo-kesiti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-12v-kablo-kesiti">
        <h3>12V Kablo Kesiti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-12v-akim">Akım (I)</label>
            <input type="number" id="hc-12v-akim" placeholder="Amper (A)" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-12v-mesafe">Kablo Mesafesi (L)</label>
            <input type="number" id="hc-12v-mesafe" placeholder="Metre (m)" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-12v-kayip">İzin Verilen Gerilim Düşümü (%)</label>
            <select id="hc-12v-kayip">
                <option value="1">1% (Çok Kritik)</option>
                <option value="3" selected>3% (Standart)</option>
                <option value="5">5% (Kritik Olmayan)</option>
                <option value="10">10% (Aydınlatma vb.)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hc12VKabloKesitiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-12v-result">
            <div class="hc-result-item">
                <span>Önerilen Kesit:</span>
                <strong class="hc-result-value" id="hc-12v-res-section">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gerilim Düşümü:</span>
                <span id="hc-12v-res-drop">-</span>
            </div>
            <div class="hc-result-note" id="hc-12v-res-note"></div>
        </div>
    </div>
    <?php
}
