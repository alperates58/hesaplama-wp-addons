<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_direk_deligi_beton_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-post-hole-concrete',
        HC_PLUGIN_URL . 'modules/direk-deligi-beton-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-post-hole-concrete-css',
        HC_PLUGIN_URL . 'modules/direk-deligi-beton-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-post-concrete">
        <h3>Direk Deliği Beton Hesabı</h3>
        <div class="hc-pc-grid">
            <div class="hc-form-group">
                <label>Delik Çapı (cm):</label>
                <input type="number" id="hc-pc-hd" placeholder="30">
            </div>
            <div class="hc-form-group">
                <label>Delik Derinliği (cm):</label>
                <input type="number" id="hc-pc-hl" placeholder="80">
            </div>
            <div class="hc-form-group">
                <label>Direk Çapı/Kenarı (cm):</label>
                <input type="number" id="hc-pc-pd" placeholder="10">
            </div>
            <div class="hc-form-group">
                <label>Direk Şekli:</label>
                <select id="hc-pc-ps">
                    <option value="round">Yuvarlak</option>
                    <option value="square">Kare</option>
                </select>
            </div>
        </div>
        <button class="hc-btn" onclick="hcPostConcreteHesapla()">Beton Miktarını Hesapla</button>
        <div class="hc-result" id="hc-post-concrete-result">
            <strong>Gereken Beton:</strong>
            <div id="hc-pc-res-val" class="hc-result-value">-</div>
            <span>Litre (L)</span>
            <p id="hc-pc-res-bags" style="margin-top:10px; font-weight:bold; color:var(--hc-primary);"></p>
        </div>
    </div>
    <?php
}
