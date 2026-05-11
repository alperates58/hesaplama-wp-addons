<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_flans_civata_tork_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bolt-torque',
        HC_PLUGIN_URL . 'modules/flans-civata-tork-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bolt-torque">
        <h3>Flanş Cıvata Tork Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Cıvata Çapı (Metrik)</label>
            <select id="hc-bt-size">
                <option value="8">M8</option>
                <option value="10">M10</option>
                <option value="12" selected>M12</option>
                <option value="14">M14</option>
                <option value="16">M16</option>
                <option value="20">M20</option>
                <option value="24">M24</option>
                <option value="30">M30</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label>Cıvata Kalitesi (Mukavemet Sınıfı)</label>
            <select id="hc-bt-grade">
                <option value="8.8">8.8 Sınıfı</option>
                <option value="10.9">10.9 Sınıfı</option>
                <option value="12.9">12.9 Sınıfı</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label>Yağlama / Yüzey Durumu</label>
            <select id="hc-bt-k">
                <option value="0.20">Kuru (K=0.20)</option>
                <option value="0.15" selected>Hafif Yağlı (K=0.15)</option>
                <option value="0.10">Çok Yağlı / Teflon (K=0.10)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcBoltTorqueHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bt-result">
            <span>Önerilen Sıkma Torku:</span>
            <div class="hc-result-value" id="hc-bt-res-val">0 Nm</div>
            <small>Uyarı: Bu değerler yaklaşıktır, cıvata üretici verileri esastır.</small>
        </div>
    </div>
    <?php
}
