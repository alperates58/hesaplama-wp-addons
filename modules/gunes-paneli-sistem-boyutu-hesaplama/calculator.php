<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_paneli_sistem_boyutu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-size',
        HC_PLUGIN_URL . 'modules/gunes-paneli-sistem-boyutu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-solar-size">
        <h3>Güneş Paneli Sistem Boyutu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Günlük Ortalama Tüketim (kWh)</label>
            <input type="number" id="hc-ss-usage" placeholder="Örn: 10" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Günlük Ortalama Güneşlenme Süresi (Saat)</label>
            <input type="number" id="hc-ss-sun" placeholder="Örn: 4.5" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Sistem Kayıpları / Verimlilik (%)</label>
            <input type="number" id="hc-ss-eff" placeholder="Örn: 75" step="1" value="75">
        </div>
        
        <div class="hc-form-group">
            <label>Panel Gücü (Watt)</label>
            <input type="number" id="hc-ss-p-watt" placeholder="Örn: 450" step="5" value="450">
        </div>
        
        <button class="hc-btn" onclick="hcSolarSizeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ss-result">
            <div style="padding: 5px 0;">
                <span>Gerekli Kurulu Güç (kWp):</span>
                <strong id="hc-ss-res-kwp" style="float:right;">0 kWp</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Tahmini Panel Sayısı:</span>
                <strong id="hc-ss-res-count" style="float:right;">0 Adet</strong>
            </div>
        </div>
    </div>
    <?php
}
