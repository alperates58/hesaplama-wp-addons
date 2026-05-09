<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_shopier_komisyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-shopier-komisyon-hesaplama',
        HC_PLUGIN_URL . 'modules/shopier-komisyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-shopier-komisyon-css',
        HC_PLUGIN_URL . 'modules/shopier-komisyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-shopier-komisyon-hesaplama">
        <h3>Shopier Komisyon Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sh-price">Satış Fiyatı (TL)</label>
            <input type="number" id="hc-sh-price" placeholder="Örn: 250">
        </div>

        <div class="hc-form-group">
            <label for="hc-sh-type">Satış Türü</label>
            <select id="hc-sh-type">
                <option value="2.99">Yurt İçi (Düşük Oran %2.99)</option>
                <option value="4.99">Yurt İçi (Yüksek Oran %4.99)</option>
                <option value="custom">Özel Oran Girin</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-sh-custom-row" style="display:none;">
            <label for="hc-sh-rate">Özel Oran (%)</label>
            <input type="number" id="hc-sh-rate" step="0.01" value="3.5">
        </div>
        
        <button class="hc-btn" onclick="hcShopierHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-shopier-result">
            <div class="hc-result-item">
                <span>Komisyon Tutarı:</span>
                <strong id="hc-sh-res-kom">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Sabit Ücret:</span>
                <strong>0,49 ₺</strong>
            </div>
            <div class="hc-result-value" id="hc-sh-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Hakediş (TL)</p>
        </div>
    </div>
    <script>
        document.getElementById('hc-sh-type').addEventListener('change', function() {
            document.getElementById('hc-sh-custom-row').style.display = (this.value === 'custom') ? 'block' : 'none';
        });
    </script>
    <?php
}
