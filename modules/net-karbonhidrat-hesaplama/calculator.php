<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_net_karbonhidrat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-net-carb',
        HC_PLUGIN_URL . 'modules/net-karbonhidrat-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-net-carb">
        <h3>Net Karbonhidrat Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-nc-total">Toplam Karbonhidrat (g)</label>
            <input type="number" id="hc-nc-total" placeholder="Gram">
        </div>

        <div class="hc-form-group">
            <label for="hc-nc-fiber">Lif (g)</label>
            <input type="number" id="hc-nc-fiber" placeholder="Gram">
        </div>

        <div class="hc-form-group">
            <label for="hc-nc-sugar-alcohol">Şeker Alkolleri (g) - Opsiyonel</label>
            <input type="number" id="hc-nc-sugar-alcohol" placeholder="Eritritol, Ksilitol vb.">
        </div>

        <button class="hc-btn" onclick="hcNetKarbonhidratHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-net-carb-result">
            <span>Net Karbonhidrat Miktarı:</span>
            <div class="hc-result-value" id="hc-nc-value">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Net Karbonhidrat = Toplam Karbonhidrat - Lif - (Şeker Alkolleri) formülüyle hesaplanır.
            </p>
        </div>
    </div>
    <?php
}
