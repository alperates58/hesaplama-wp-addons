<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cozme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thawing-time',
        HC_PLUGIN_URL . 'modules/cozme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-thawing-time">
        <h3>Gıda Çözme Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Ürün Kalınlığı (cm)</label>
            <input type="number" id="hc-cs-thk" placeholder="Örn: 4" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Çözme Yöntemi</label>
            <select id="hc-cs-method">
                <option value="15">Buzdolabında (+4°C)</option>
                <option value="5">Oda Sıcaklığında (+20°C)</option>
                <option value="2.5">Akan Soğuk Suda</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcCozmeSuresiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cs-result">
            <span>Tahmini Çözme Süresi:</span>
            <div class="hc-result-value" id="hc-cs-res-val">0 saat</div>
            <small>Not: Gıda güvenliği için buzdolabında çözme önerilir.</small>
        </div>
    </div>
    <?php
}
