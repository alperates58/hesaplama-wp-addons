<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_hata_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-yuzde-hata-hesaplayici',
        HC_PLUGIN_URL . 'modules/yuzde-hata-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yuzde-hata-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/yuzde-hata-hesaplayici/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yuzde-hata-hesaplayici">
        <div class="hc-header">
            <h3>Yüzde Hata Hesaplayıcısı</h3>
            <p>Tahmini ve gerçek değerleri girerek hata payını hesaplayın.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Teorik Değer (Gerçek)</label>
                <input type="number" id="hc-err-the" placeholder="Örn: 50" step="any">
            </div>
            <div class="hc-form-group">
                <label>Deneysel Değer (Ölçülen)</label>
                <input type="number" id="hc-err-exp" placeholder="Örn: 48" step="any">
            </div>
        </div>

        <button class="hc-btn" onclick="hcErrHesapla()">Hata Oranını Hesapla</button>

        <div class="hc-result" id="hc-err-result">
            <div class="hc-res-box">
                <div class="hc-res-label">YÜZDE HATA</div>
                <div class="hc-res-main">
                    <span id="hc-res-err-val">0</span>%
                </div>
                <div class="hc-formula-box">
                    |Teorik - Deneysel| / Teorik × 100
                </div>
            </div>
        </div>
    </div>
    <?php
}
