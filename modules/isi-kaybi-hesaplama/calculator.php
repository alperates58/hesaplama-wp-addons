<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isi_kaybi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-heat-loss',
        HC_PLUGIN_URL . 'modules/isi-kaybi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-heat-loss-css',
        HC_PLUGIN_URL . 'modules/isi-kaybi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-heat-loss">
        <h3>Isı Kaybı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hl-area">Alan (m²):</label>
            <input type="number" id="hc-hl-area" placeholder="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-hl-height">Tavan Yüksekliği (m):</label>
            <input type="number" id="hc-hl-height" value="2.8">
        </div>
        <div class="hc-form-group">
            <label for="hc-hl-ins">Yalıtım Durumu:</label>
            <select id="hc-hl-ins">
                <option value="30">Çok İyi (A+ Enerji)</option>
                <option value="45" selected>Orta (Standart Mantolama)</option>
                <option value="60">Zayıf (Yalıtımsız)</option>
                <option value="80">Çok Zayıf (Eski Yapı)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcHeatLossHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-heat-loss-result">
            <strong>Gereken Isıl Güç:</strong>
            <div id="hc-hl-res-val" class="hc-result-value">-</div>
            <span>Watt (W)</span>
            <p id="hc-hl-res-rad" style="margin-top:10px; font-weight:bold; color:var(--hc-primary);"></p>
        </div>
    </div>
    <?php
}
