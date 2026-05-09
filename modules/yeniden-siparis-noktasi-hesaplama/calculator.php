<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yeniden_siparis_noktasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-reorder-point',
        HC_PLUGIN_URL . 'modules/yeniden-siparis-noktasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-reorder-point-css',
        HC_PLUGIN_URL . 'modules/yeniden-siparis-noktasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-reorder-point">
        <h3>Yeniden Sipariş Noktası (ROP)</h3>
        <div class="hc-form-group">
            <label for="hc-rop-lead">Tedarik Süresi (Lead Time) [Gün]</label>
            <input type="number" id="hc-rop-lead" value="5" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-rop-usage">Günlük Ortalama Kullanım [Adet]</label>
            <input type="number" id="hc-rop-usage" value="20" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-rop-safety">Güvenlik Stoku [Adet]</label>
            <input type="number" id="hc-rop-safety" value="50" min="0">
        </div>
        <button class="hc-btn" onclick="hcReorderPointHesapla()">ROP Hesapla</button>
        <div class="hc-result" id="hc-reorder-point-result">
            <div class="hc-result-item">
                <span>Sipariş Noktası (ROP):</span>
                <span class="hc-result-value" id="hc-res-rop-val">0 Adet</span>
            </div>
            <p class="hc-rop-note">Stok bu seviyeye düştüğünde yeni sipariş verilmeli.</p>
        </div>
    </div>
    <?php
}
