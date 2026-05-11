<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_istinat_duvari_stabilite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-retaining-wall',
        HC_PLUGIN_URL . 'modules/istinat-duvari-stabilite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-retaining-wall">
        <h3>İstinat Duvarı Stabilite Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Duvar Yüksekliği (H, m)</label>
            <input type="number" id="hc-rw-h" placeholder="m" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Taban Genişliği (B, m)</label>
            <input type="number" id="hc-rw-b" placeholder="m" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Toprak İçsel Sürtünme Açısı (φ, Derece)</label>
            <input type="number" id="hc-rw-phi" placeholder="Örn: 30" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Toprak Birim Ağırlığı (kN/m³)</label>
            <input type="number" id="hc-rw-gamma" placeholder="Örn: 18" step="0.1" value="18">
        </div>
        
        <button class="hc-btn" onclick="hcRetainingWallHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-rw-result">
            <div style="padding: 5px 0;">
                <span>Devrilme Güvenlik Sayısı (FSo):</span>
                <strong id="hc-rw-res-fso" style="float:right;">0</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Kayma Güvenlik Sayısı (FSs):</span>
                <strong id="hc-rw-res-fss" style="float:right;">0</strong>
            </div>
            <div id="hc-rw-res-status" style="margin-top:10px; text-align:center; font-weight:bold;">-</div>
        </div>
    </div>
    <?php
}
