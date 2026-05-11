<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cpc_ve_cpm_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cpc-cpm',
        HC_PLUGIN_URL . 'modules/cpc-ve-cpm-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cpc-cpm-css',
        HC_PLUGIN_URL . 'modules/cpc-ve-cpm-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cpc-cpm-calc">
        <h3>CPC ve CPM Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cc-cost">Toplam Harcama (₺)</label>
            <input type="number" id="hc-cc-cost" placeholder="Örn: 5.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-clicks">Tıklama Sayısı</label>
            <input type="number" id="hc-cc-clicks" placeholder="Örn: 250">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-impressions">Gösterim Sayısı</label>
            <input type="number" id="hc-cc-impressions" placeholder="Örn: 100.000">
        </div>
        <button class="hc-btn" onclick="hcCpcCpmHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cc-result">
            <div class="hc-result-item">
                <span>CPC (Tıklama Başı Maliyet):</span>
                <strong id="hc-cc-res-cpc">-</strong>
            </div>
            <div class="hc-result-item">
                <span>CPM (1000 Gösterim Maliyeti):</span>
                <strong id="hc-cc-res-cpm">-</strong>
            </div>
        </div>
    </div>
    <?php
}
