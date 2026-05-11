<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_is_makinesi_yakit_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-heavy-fuel',
        HC_PLUGIN_URL . 'modules/is-makinesi-yakit-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-heavy-fuel">
        <h3>İş Makinesi Yakıt Tüketimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Motor Gücü (Beygir, HP)</label>
            <input type="number" id="hc-im-hp" placeholder="Örn: 200" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Çalışma Süresi (Saat)</label>
            <input type="number" id="hc-im-hours" placeholder="Örn: 8" step="0.5">
        </div>
        
        <div class="hc-form-group">
            <label>Yük Faktörü</label>
            <select id="hc-im-load">
                <option value="0.35">Düşük (%35 Yük)</option>
                <option value="0.55" selected>Orta (%55 Yük)</option>
                <option value="0.75">Yüksek (%75 Yük)</option>
                <option value="0.90">Tam Yük (%90+ Yük)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcHeavyFuelHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-im-result">
            <span>Tahmini Yakıt Tüketimi:</span>
            <div class="hc-result-value" id="hc-im-res-val">0 Litre</div>
            <div id="hc-im-res-hourly" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Saatlik: 0 L/saat</div>
        </div>
    </div>
    <?php
}
