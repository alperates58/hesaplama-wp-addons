<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_baklava_porsiyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-baklava-portion',
        HC_PLUGIN_URL . 'modules/baklava-porsiyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-baklava-portion-css',
        HC_PLUGIN_URL . 'modules/baklava-porsiyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baklava-portion">
        <h3>Baklava Porsiyon Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-bp-tray">Tepsi Türü</label>
            <select id="hc-bp-tray">
                <option value="std_rect">Standart Dikdörtgen (40x60 cm)</option>
                <option value="std_round">Standart Yuvarlak (40 cm)</option>
                <option value="home_rect">Ev Tipi Dikdörtgen (30x40 cm)</option>
                <option value="custom">Özel Boyut</option>
            </select>
        </div>
        <div id="hc-bp-custom-fields" style="display: none;">
            <div class="hc-form-group">
                <label>Genişlik (cm)</label>
                <input type="number" id="hc-bp-w" placeholder="cm">
            </div>
            <div class="hc-form-group">
                <label>Uzunluk (cm)</label>
                <input type="number" id="hc-bp-l" placeholder="cm">
            </div>
        </div>
        <button class="hc-btn" onclick="hcBaklavaPortionHesapla()">Porsiyonları Gör</button>
        <div class="hc-result" id="hc-baklava-portion-result">
            <div class="hc-result-item">
                <span>Tahmini Dilim Sayısı:</span>
                <span class="hc-result-value" id="hc-res-bp-slices">0 Adet</span>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Porsiyon (4 dilim):</span>
                <span id="hc-res-bp-portions">0 Kişilik</span>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('hc-bp-tray').addEventListener('change', function() {
            document.getElementById('hc-bp-custom-fields').style.display = this.value === 'custom' ? 'block' : 'none';
        });
    </script>
    <?php
}
