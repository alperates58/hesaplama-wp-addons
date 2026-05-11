<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kesme_hizi_ve_ilerleme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cutting-speed',
        HC_PLUGIN_URL . 'modules/kesme-hizi-ve-ilerleme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cutting-speed">
        <h3>Kesme Hızı ve İlerleme Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Takım/İş Parçası Çapı (D, mm)</label>
            <input type="number" id="hc-cs-d" placeholder="mm" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Devir Sayısı (n, RPM)</label>
            <input type="number" id="hc-cs-n" placeholder="RPM" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Diş Başına İlerleme (fz, mm/diş)</label>
            <input type="number" id="hc-cs-fz" placeholder="Örn: 0.1" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Takım Diş Sayısı (z)</label>
            <input type="number" id="hc-cs-z" placeholder="Örn: 4" step="1" value="1">
        </div>
        
        <button class="hc-btn" onclick="hcCuttingSpeedHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cs-result">
            <div style="padding: 5px 0;">
                <span>Kesme Hızı (Vc):</span>
                <strong id="hc-cs-res-vc" style="float:right;">0 m/dak</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>İlerleme Hızı (Vf):</span>
                <strong id="hc-cs-res-vf" style="float:right;">0 mm/dak</strong>
            </div>
        </div>
    </div>
    <?php
}
