<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_havalandirma_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vent-calc',
        HC_PLUGIN_URL . 'modules/havalandirma-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vent-calc">
        <h3>Havalandırma Kapasitesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Oda Hacmi (V, m³)</label>
            <input type="number" id="hc-vc-v" placeholder="m³" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Saatlik Hava Değişimi (ACH, n)</label>
            <select id="hc-vc-n">
                <option value="2">Konut / Ofis (2-4)</option>
                <option value="6">Mutfak (6-10)</option>
                <option value="15">Otopark / Fabrika (15-30)</option>
                <option value="custom">Özel Değer...</option>
            </select>
        </div>
        
        <div class="hc-form-group" id="hc-vc-custom-group" style="display:none;">
            <label>Özel Değişim Katsayısı</label>
            <input type="number" id="hc-vc-n-custom" placeholder="n" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcVentCalcHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-vc-result">
            <span>Gereken Hava Debisi (Q):</span>
            <div class="hc-result-value" id="hc-vc-res-val">0 m³/h</div>
        </div>
    </div>
    <script>
        document.getElementById('hc-vc-n').addEventListener('change', function() {
            document.getElementById('hc-vc-custom-group').style.display = (this.value === 'custom' ? 'block' : 'none');
        });
    </script>
    <?php
}
