<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fire_ve_randiman_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-randiman',
        HC_PLUGIN_URL . 'modules/fire-ve-randiman-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-randiman">
        <h3>Fire ve Randıman Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Toplam Giriş Miktarı (kg, adet vb.)</label>
            <input type="number" id="hc-fr-input" placeholder="Örn: 1000" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Sağlam Çıkış Miktarı</label>
            <input type="number" id="hc-fr-output" placeholder="Örn: 950" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcRandimanHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-fr-result">
            <div style="display: flex; justify-content: space-around; text-align: center;">
                <div>
                    <span>Randıman</span>
                    <div class="hc-result-value" id="hc-fr-res-yield">%0</div>
                </div>
                <div>
                    <span>Fire Oranı</span>
                    <div class="hc-result-value" id="hc-fr-res-loss" style="color: #e74c3c;">%0</div>
                </div>
            </div>
            <div id="hc-fr-res-desc" style="margin-top:10px; text-align:center; font-size:0.9em; opacity:0.8;">
                Fire Miktarı: 0
            </div>
        </div>
    </div>
    <?php
}
