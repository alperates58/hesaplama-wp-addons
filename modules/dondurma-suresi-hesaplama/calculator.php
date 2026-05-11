<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dondurma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-freezing-time',
        HC_PLUGIN_URL . 'modules/dondurma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-freezing-time">
        <h3>Gıda Dondurma Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Ürün Kalınlığı (cm)</label>
            <input type="number" id="hc-ds-thk" placeholder="Örn: 5" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Dondurucu Sıcaklığı (°C)</label>
            <input type="number" id="hc-ds-ta" value="-18" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Ürün Başlangıç Sıcaklığı (°C)</label>
            <input type="number" id="hc-ds-ti" value="20" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Ürün Tipi (Su Oranı)</label>
            <select id="hc-ds-type">
                <option value="0.8">Et/Balık (Yüksek Su)</option>
                <option value="0.9">Sebze/Meyve (Çok Yüksek Su)</option>
                <option value="0.5">Hamur İşi (Orta Su)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcDondurmaSuresiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ds-result">
            <span>Tahmini Dondurma Süresi:</span>
            <div class="hc-result-value" id="hc-ds-res-val">0 saat</div>
            <small>Not: Plank denklemi bazlı yaklaşık bir tahmindir.</small>
        </div>
    </div>
    <?php
}
