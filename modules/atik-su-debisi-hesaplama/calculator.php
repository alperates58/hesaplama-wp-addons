<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atik_su_debisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atik-su-debisi',
        HC_PLUGIN_URL . 'modules/atik-su-debisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atik-su-debisi-css',
        HC_PLUGIN_URL . 'modules/atik-su-debisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-atik-su-debisi">
        <h3>Atık Su Debisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-as-nufus">Gelecek Nüfus (kişi)</label>
            <input type="number" id="hc-as-nufus" placeholder="Örn: 10000" step="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-as-tuketim">Kişi Başı Günlük Su Tüketimi (L/gün)</label>
            <input type="number" id="hc-as-tuketim" placeholder="Örn: 150" step="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-as-donus">Şebekeye Dönüş Oranı (%)</label>
            <input type="number" id="hc-as-donus" placeholder="Örn: 80" step="1" value="80">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-as-sizma">Sızma Debisi (L/sn)</label>
            <input type="number" id="hc-as-sizma" placeholder="Örn: 0.5" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-as-sanayi">Ek Sanayi Debisi (L/sn)</label>
            <input type="number" id="hc-as-sanayi" placeholder="Örn: 2" step="0.1" value="0">
        </div>
        
        <button class="hc-btn" onclick="hcAtikSuDebisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-as-result">
            <div class="hc-result-item">
                <span>Evsel Atık Su Debisi:</span>
                <strong id="hc-as-evsel">0 L/sn</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Atık Su Debisi (Q):</span>
                <strong class="hc-result-value" id="hc-as-toplam">0 L/sn</strong>
            </div>
            <div class="hc-result-item">
                <span>Günlük Toplam Hacim:</span>
                <strong id="hc-as-hacim">0 m³/gün</strong>
            </div>
        </div>
    </div>
    <?php
}
