<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_askerlik_borclanmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-askerlik-borclanmasi-hesaplama',
        HC_PLUGIN_URL . 'modules/askerlik-borclanmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-askerlik-borclanmasi-css',
        HC_PLUGIN_URL . 'modules/askerlik-borclanmasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-askerlik-borclanmasi-hesaplama">
        <h3>Askerlik Borçlanması Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ask-duration">Askerlik Süresi (Ay)</label>
            <select id="hc-ask-duration">
                <option value="6">6 Ay (Er/Erbaş)</option>
                <option value="12">12 Ay (Yedek Subay/Astsubay)</option>
                <option value="18">18 Ay (Eski Sistem)</option>
                <option value="other">Diğer (Gün Girin)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-ask-custom-days-row" style="display:none;">
            <label for="hc-ask-days">Borçlanılacak Gün</label>
            <input type="number" id="hc-ask-days" placeholder="Örn: 540">
        </div>
        
        <button class="hc-btn" onclick="hcAskerlikBorcHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-askerlik-result">
            <div class="hc-result-item">
                <span>Günlük Prim (Alt Sınır):</span>
                <strong>352,32 ₺</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Gün:</span>
                <strong id="hc-ask-res-days">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ask-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">2026 Yılı Toplam Borçlanma Bedeli</p>
        </div>
    </div>
    <script>
        document.getElementById('hc-ask-duration').addEventListener('change', function() {
            document.getElementById('hc-ask-custom-days-row').style.display = (this.value === 'other') ? 'block' : 'none';
        });
    </script>
    <?php
}
