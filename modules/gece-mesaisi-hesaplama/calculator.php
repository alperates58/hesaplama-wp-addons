<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gece_mesaisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gece-mesai',
        HC_PLUGIN_URL . 'modules/gece-mesaisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gece-mesai-css',
        HC_PLUGIN_URL . 'modules/gece-mesaisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gece-mesaisi-hesaplama">
        <h3>Gece Mesaisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gm-salary">Brüt Maaş (TL)</label>
            <input type="number" id="hc-gm-salary" placeholder="Aylık Brüt Maaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-gm-hours">Günlük Ortalama Gece Mesaisi (Saat)</label>
            <input type="number" id="hc-gm-hours" placeholder="Örn: 9">
            <small>Not: Gece çalışmasında 7.5 saati aşan süreler fazla mesai sayılır.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-gm-days">Aylık Gece Çalışılan Gün Sayısı</label>
            <input type="number" id="hc-gm-days" value="22">
        </div>
        
        <button class="hc-btn" onclick="hcGeceMesaiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gece-result">
            <div class="hc-result-item">
                <span>Günlük Fazla Mesai (Saat):</span>
                <strong id="hc-gm-res-extra-h">-</strong>
            </div>
            <div class="hc-result-value" id="hc-gm-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Aylık Brüt Gece Mesaisi Ücreti</p>
        </div>
    </div>
    <?php
}
