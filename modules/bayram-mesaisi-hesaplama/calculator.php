<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bayram_mesaisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bayram-mesai',
        HC_PLUGIN_URL . 'modules/bayram-mesaisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bayram-mesai-css',
        HC_PLUGIN_URL . 'modules/bayram-mesaisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bayram-mesaisi-hesaplama">
        <h3>Bayram Mesaisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bm-salary">Brüt Maaş (TL)</label>
            <input type="number" id="hc-bm-salary" placeholder="Aylık Brüt Maaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-bm-days">Bayramda Çalışılan Gün Sayısı</label>
            <input type="number" id="hc-bm-days" placeholder="Örn: 2">
        </div>
        
        <button class="hc-btn" onclick="hcBayramMesaiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bayram-result">
            <div class="hc-result-item">
                <span>Günlük Brüt Ücret:</span>
                <strong id="hc-bm-res-daily">-</strong>
            </div>
            <div class="hc-result-value" id="hc-bm-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Brüt Bayram Mesai Ücreti</p>
            <small style="display:block; text-align:center; color:#999;">Not: Bayramda çalışan işçi, normal maaşına ek olarak çalıştığı her gün için 1 tam günlük ücret daha alır.</small>
        </div>
    </div>
    <?php
}
