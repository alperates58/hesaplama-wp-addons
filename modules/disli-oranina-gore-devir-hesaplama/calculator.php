<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_disli_oranina_gore_devir_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-disli-devir',
        HC_PLUGIN_URL . 'modules/disli-oranina-gore-devir-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-disli-devir">
        <h3>Dişli Oranına Göre Devir Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Giriş Devri (RPM - Devir/Dakika)</label>
            <input type="number" id="hc-dod-giris-rpm" placeholder="Örn: 1450" step="1">
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label>Giriş Diş Sayısı</label>
                <input type="number" id="hc-dod-giris-dis" placeholder="Giriş" step="1">
            </div>
            <div class="hc-form-group">
                <label>Çıkış Diş Sayısı</label>
                <input type="number" id="hc-dod-cikis-dis" placeholder="Çıkış" step="1">
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcDisliDevirHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dod-result">
            <span>Çıkış Devri:</span>
            <div class="hc-result-value" id="hc-dod-res-rpm">0 RPM</div>
            <div id="hc-dod-res-tork" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Tork Oranı: 1.00x</div>
        </div>
    </div>
    <?php
}
