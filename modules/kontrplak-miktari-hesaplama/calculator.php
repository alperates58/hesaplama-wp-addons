<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kontrplak_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-plywood-calc',
        HC_PLUGIN_URL . 'modules/kontrplak-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-plywood-calc-css',
        HC_PLUGIN_URL . 'modules/kontrplak-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-plywood">
        <h3>Kontrplak / OSB Levha Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-pl-area">Kaplanacak Toplam Alan (m²):</label>
            <input type="number" id="hc-pl-area" step="0.1" placeholder="30.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-pl-size">Levha Boyutu:</label>
            <select id="hc-pl-size">
                <option value="3.125">Standart (250x125 cm ~3.12 m²)</option>
                <option value="2.976">Küçük (244x122 cm ~2.98 m²)</option>
                <option value="custom">Özel Ölçü</option>
            </select>
        </div>
        <div id="hc-pl-custom-row" style="display:none;">
            <div class="hc-form-group">
                <label>Levha Boyutu (cm):</label>
                <div style="display:flex; gap:10px;">
                    <input type="number" id="hc-pl-w" placeholder="250">
                    <input type="number" id="hc-pl-h" placeholder="125">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcPlywoodCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-plywood-result">
            <strong>Gereken Levha Sayısı:</strong>
            <div id="hc-pl-res-val" class="hc-result-value">-</div>
            <span>Adet</span>
            <p style="margin-top:10px; font-size:0.8rem;">%10 kesim firesi eklenmiştir.</p>
        </div>
    </div>
    <script>
        document.getElementById('hc-pl-size').addEventListener('change', function() {
            document.getElementById('hc-pl-custom-row').style.display = this.value === 'custom' ? 'block' : 'none';
        });
    </script>
    <?php
}
