<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kek_kalibi_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cake-pan-size',
        HC_PLUGIN_URL . 'modules/kek-kalibi-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cake-pan-size-calc">
        <h3>Kek Kalıbı Hacmi ve Porsiyon</h3>
        <div class="hc-form-group">
            <label for="hc-pan-shape">Kalıp Şekli:</label>
            <select id="hc-pan-shape">
                <option value="circle">Yuvarlak</option>
                <option value="square">Kare / Dikdörtgen</option>
            </select>
        </div>
        <div id="hc-pan-circle-inputs">
            <div class="hc-form-group">
                <label for="hc-pan-diam">Çap (cm):</label>
                <input type="number" id="hc-pan-diam" placeholder="24">
            </div>
        </div>
        <div id="hc-pan-rect-inputs" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-pan-width">Genişlik (cm):</label>
                <input type="number" id="hc-pan-width" placeholder="20">
            </div>
            <div class="hc-form-group">
                <label for="hc-pan-length">Uzunluk (cm):</label>
                <input type="number" id="hc-pan-length" placeholder="20">
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-pan-height">Yükseklik (cm):</label>
            <input type="number" id="hc-pan-height" placeholder="7">
        </div>
        <button class="hc-btn" onclick="hcCakePanSizeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cake-pan-size-result">
            <strong>Kalıp Bilgileri:</strong>
            <div id="hc-pan-volume" class="hc-result-value">-</div>
            <p id="hc-pan-servings"></p>
        </div>
    </div>
    <script>
        document.getElementById('hc-pan-shape').addEventListener('change', function() {
            document.getElementById('hc-pan-circle-inputs').style.display = this.value === 'circle' ? 'block' : 'none';
            document.getElementById('hc-pan-rect-inputs').style.display = this.value === 'square' ? 'block' : 'none';
        });
    </script>
    <?php
}
