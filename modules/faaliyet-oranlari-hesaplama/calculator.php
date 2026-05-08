<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_faaliyet_oranlari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-activity',
        HC_PLUGIN_URL . 'modules/faaliyet-oranlari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-activity-css',
        HC_PLUGIN_URL . 'modules/faaliyet-oranlari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-activity">
        <h3>Faaliyet Oranları (Verimlilik) Analizi</h3>
        
        <div class="hc-form-group">
            <label for="hc-ac-revenue">Net Satışlar (TL)</label>
            <input type="number" id="hc-ac-revenue">
        </div>

        <div class="hc-form-group">
            <label for="hc-ac-cogs">Satılan Malın Maliyeti (SMM) (TL)</label>
            <input type="number" id="hc-ac-cogs">
        </div>

        <div class="hc-form-group">
            <label for="hc-ac-inventory">Ortalama Stoklar (TL)</label>
            <input type="number" id="hc-ac-inventory">
        </div>

        <div class="hc-form-group">
            <label for="hc-ac-assets">Toplam Varlıklar (TL)</label>
            <input type="number" id="hc-ac-assets">
        </div>
        
        <button class="hc-btn" onclick="hcFaaliyetHesapla()">Analiz Et</button>
        
        <div class="hc-result" id="hc-activity-result">
            <div class="hc-result-item">
                <span>Stok Devir Hızı:</span>
                <strong id="hc-ac-res-stok">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Varlık Devir Hızı:</span>
                <strong id="hc-ac-res-assets">-</strong>
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666; margin-top: 10px;">Operasyonel Verimlilik Göstergeleri</p>
        </div>
    </div>
    <?php
}
