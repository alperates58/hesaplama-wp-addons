<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cop_poseti_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cop-poseti-olcusu-hesaplama',
        HC_PLUGIN_URL . 'modules/cop-poseti-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cop-poseti-olcusu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cop-poseti-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bin-bag">
        <h3>Çöp Poşeti Ölçüsü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bb-type">Kova Şekli</label>
            <select id="hc-bb-type">
                <option value="round">Yuvarlak / Silindir</option>
                <option value="square">Kare / Dikdörtgen</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-bb-w">Genişlik / Çap (cm)</label>
            <input type="number" id="hc-bb-w" placeholder="Örn: 30">
        </div>
        <div class="hc-form-group" id="hc-bb-d-group" style="display:none;">
            <label for="hc-bb-d">Derinlik (cm)</label>
            <input type="number" id="hc-bb-d" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label for="hc-bb-h">Kova Yüksekliği (cm)</label>
            <input type="number" id="hc-bb-h" placeholder="Örn: 40">
        </div>
        <button class="hc-btn" onclick="hcÇöpPoşetiÖlçüsüHesapla()">Ölçüyü Hesapla</button>
        <div class="hc-result" id="hc-bb-result">
            <div class="hc-result-label">Önerilen Poşet Ölçüsü:</div>
            <div class="hc-result-value" id="hc-bb-val">-</div>
        </div>
    </div>
    <script>
        document.getElementById('hc-bb-type').addEventListener('change', function() {
            document.getElementById('hc-bb-d-group').style.display = this.value === 'square' ? 'block' : 'none';
        });
    </script>
    <?php
}
