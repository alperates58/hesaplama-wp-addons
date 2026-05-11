<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cpu_kullanim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cpu-usage',
        HC_PLUGIN_URL . 'modules/cpu-kullanim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cpu-usage">
        <h3>CPU Kullanım Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Aktif Çalışma Süresi (Usage Time, ms)</label>
            <input type="number" id="hc-cpu-active" placeholder="ms" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Boşta Kalma Süresi (Idle Time, ms)</label>
            <input type="number" id="hc-cpu-idle" placeholder="ms" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcCpuUsageHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cpu-result">
            <span>CPU Kullanımı:</span>
            <div class="hc-result-value" id="hc-cpu-res-val">%0</div>
            <div id="hc-cpu-res-info" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Toplam Süre: 0 ms</div>
        </div>
    </div>
    <?php
}
