<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_disli_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-disli-orani',
        HC_PLUGIN_URL . 'modules/disli-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-disli-orani">
        <h3>Dişli Oranı (Gear Ratio) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Sürücü Dişli (Giriş) Diş Sayısı</label>
            <input type="number" id="hc-do-giris" placeholder="Örn: 10" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Sürülen Dişli (Çıkış) Diş Sayısı</label>
            <input type="number" id="hc-do-cikis" placeholder="Örn: 30" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcDisliOraniHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-do-result">
            <span>Dişli Oranı:</span>
            <div class="hc-result-value" id="hc-do-res-oran">0 : 1</div>
            <div id="hc-do-res-decimal" style="margin-top:5px; font-size:1em; opacity:0.8;">Ondalık: 0</div>
        </div>
    </div>
    <?php
}
