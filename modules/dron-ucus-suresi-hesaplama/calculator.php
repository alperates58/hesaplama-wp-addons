<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dron_ucus_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-drone-flight',
        HC_PLUGIN_URL . 'modules/dron-ucus-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-drone-flight">
        <h3>Dron Uçuş Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Batarya Kapasitesi (mAh)</label>
            <input type="number" id="hc-du-cap" placeholder="Örn: 5000" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Ortalama Akım Çekişi (Amper, A)</label>
            <input type="number" id="hc-du-amp" placeholder="Örn: 20" step="0.1">
            <small>Toplam tüm motorlar ve elektroniklerin çektiği akım.</small>
        </div>
        
        <div class="hc-form-group">
            <label>Güvenli Deşarj Oranı (%)</label>
            <input type="number" id="hc-du-dis" value="80" step="1">
            <small>LiPo bataryalar için genellikle %80 önerilir.</small>
        </div>
        
        <button class="hc-btn" onclick="hcDronUcusHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-du-result">
            <span>Tahmini Uçuş Süresi:</span>
            <div class="hc-result-value" id="hc-du-res-val">0 dk</div>
            <small>Not: Rüzgar, sıcaklık ve kullanım tarzı süreyi önemli ölçüde etkiler.</small>
        </div>
    </div>
    <?php
}
