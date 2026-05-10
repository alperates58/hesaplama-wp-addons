<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_parke_tasi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-paver-calc',
        HC_PLUGIN_URL . 'modules/parke-tasi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-paver-calc-css',
        HC_PLUGIN_URL . 'modules/parke-tasi-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-paver">
        <h3>Parke Taşı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pc-area">Kaplanacak Alan (m²):</label>
            <input type="number" id="hc-pc-area" step="0.1" placeholder="50.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-type">Taş Tipi (Yaklaşık Sarfiyat):</label>
            <select id="hc-pc-type">
                <option value="50">Kilit Parke (Yaklaşık 50 adet/m²)</option>
                <option value="36">Küp Taş 10x10 (Yaklaşık 100 adet/m²)</option>
                <option value="custom">Özel Boyut Gir</option>
            </select>
        </div>
        <div id="hc-pc-custom-row" style="display:none;">
            <div class="hc-form-group">
                <label>Taş Boyutu (cm):</label>
                <div style="display:flex; gap:10px;">
                    <input type="number" id="hc-pc-w" placeholder="20">
                    <input type="number" id="hc-pc-h" placeholder="10">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcPaverCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-paver-result">
            <strong>Gereken Toplam Taş:</strong>
            <div id="hc-pc-res-val" class="hc-result-value">-</div>
            <span>Adet</span>
            <p style="margin-top:10px; font-size:0.8rem;">%5 kesim firesi eklenmiştir.</p>
        </div>
    </div>
    <script>
        document.getElementById('hc-pc-type').addEventListener('change', function() {
            document.getElementById('hc-pc-custom-row').style.display = this.value === 'custom' ? 'block' : 'none';
        });
    </script>
    <?php
}
