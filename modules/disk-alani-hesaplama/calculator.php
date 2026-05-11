<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_disk_alani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-disk-space',
        HC_PLUGIN_URL . 'modules/disk-alani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-disk-space">
        <h3>Disk Alanı ve Kapasite Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Toplam Disk Alanı (GB)</label>
            <input type="number" id="hc-ds-total" placeholder="Örn: 500" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Kullanılan Alan (GB)</label>
            <input type="number" id="hc-ds-used" placeholder="Örn: 300" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcDiskSpaceHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ds-result">
            <div style="display: flex; justify-content: space-between;">
                <span>Kullanım Oranı:</span>
                <strong id="hc-ds-res-percent">%0</strong>
            </div>
            <div style="display: flex; justify-content: space-between; margin-top:5px;">
                <span>Kalan Alan:</span>
                <strong id="hc-ds-res-free">0 GB</strong>
            </div>
            <hr>
            <div style="margin-top:10px;">
                <strong>Kalan Alana Ne Sığar? (Tahmini)</strong>
                <ul style="font-size:0.9em; margin-top:5px; padding-left:20px;">
                    <li id="hc-ds-est-video">1080p Video: 0 saat</li>
                    <li id="hc-ds-est-photo">Yüksek Çöz. Fotoğraf: 0 adet</li>
                    <li id="hc-ds-est-music">MP3 Müzik: 0 adet</li>
                </ul>
            </div>
        </div>
    </div>
    <?php
}
