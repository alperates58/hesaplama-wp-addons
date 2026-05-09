<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_degisim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yuzde-degisim-hesaplama',
        HC_PLUGIN_URL . 'modules/yuzde-degisim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yuzde-degisim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yuzde-degisim-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yuzde-degisim-hesaplama">
        <div class="hc-header">
            <h3>Yüzde Değişim Hesaplama</h3>
            <p>Eski ve yeni değerleri girerek değişim oranını bulun.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>İlk Değer (Eski)</label>
                <input type="number" id="hc-pc-old" placeholder="Örn: 100" step="any">
            </div>
            <div class="hc-form-group">
                <label>Son Değer (Yeni)</label>
                <input type="number" id="hc-pc-new" placeholder="Örn: 125" step="any">
            </div>
        </div>

        <button class="hc-btn" onclick="hcPcHesapla()">Değişimi Hesapla</button>

        <div class="hc-result" id="hc-pc-result">
            <div id="hc-pc-card" class="hc-res-card">
                <div class="hc-res-label" id="hc-pc-label">DEĞİŞİM</div>
                <div class="hc-res-main">
                    <span id="hc-res-pc-val">0</span>%
                </div>
                <div class="hc-res-info" id="hc-pc-info"></div>
            </div>
        </div>
    </div>
    <?php
}
