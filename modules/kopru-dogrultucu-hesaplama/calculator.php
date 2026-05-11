<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kopru_dogrultucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rectifier',
        HC_PLUGIN_URL . 'modules/kopru-dogrultucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-rectifier">
        <h3>Köprü Doğrultucu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>AC Giriş Gerilimi (Vrms)</label>
            <input type="number" id="hc-rd-vrms" placeholder="V" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Frekans (f, Hz)</label>
            <input type="number" id="hc-rd-f" placeholder="Hz" step="1" value="50">
        </div>
        
        <div class="hc-form-group">
            <label>Yük Akımı (I-yük, Amper)</label>
            <input type="number" id="hc-rd-i" placeholder="A" step="0.1" value="1">
        </div>
        
        <div class="hc-form-group">
            <label>Filtre Kapasitesi (C, μF)</label>
            <input type="number" id="hc-rd-c" placeholder="μF" step="10" value="1000">
        </div>
        
        <button class="hc-btn" onclick="hcRectifierHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-rd-result">
            <div style="padding: 5px 0;">
                <span>Ortalama Çıkış (Vdc):</span>
                <strong id="hc-rd-res-vdc" style="float:right;">0 V</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Dalgalanma (Ripple):</span>
                <strong id="hc-rd-res-ripple" style="float:right;">0 V</strong>
            </div>
        </div>
    </div>
    <?php
}
