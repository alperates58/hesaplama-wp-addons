<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_sekli_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-vucut-sekli-hesaplayici',
        HC_PLUGIN_URL . 'modules/vucut-sekli-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vucut-sekli-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/vucut-sekli-hesaplayici/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vucut-sekli-hesaplayici">
        <div class="hc-header">
            <h3>Vücut Şekli Hesaplayıcı</h3>
            <p>Ölçülerinizi girerek vücut tipinizi ve giyim tavsiyelerinizi öğrenin.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Göğüs Çevresi (cm)</label>
                <input type="number" id="hc-shape-bust" placeholder="95">
            </div>
            <div class="hc-form-group">
                <label>Bel Çevresi (cm)</label>
                <input type="number" id="hc-shape-waist" placeholder="70">
            </div>
            <div class="hc-form-group full-width">
                <label>Kalça Çevresi (cm)</label>
                <input type="number" id="hc-shape-hip" placeholder="100">
            </div>
        </div>

        <button class="hc-btn" onclick="hcShapeHesapla()">Tipi Belirle</button>

        <div class="hc-result" id="hc-shape-result">
            <div class="hc-res-card">
                <div class="hc-res-label">VÜCUT TİPİNİZ</div>
                <div class="hc-res-main" id="hc-res-shape-val">-</div>
                <div class="hc-res-desc" id="hc-res-shape-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
