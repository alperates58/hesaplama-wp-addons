<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_mama_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-mama',
        HC_PLUGIN_URL . 'modules/bebek-mama-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-mama">
        <h3>Bebek Mama Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bmm-kilo">Bebeğin Ağırlığı (kg)</label>
            <input type="number" id="hc-bmm-kilo" placeholder="Örn: 5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-bmm-ogun">Günlük Öğün Sayısı</label>
            <input type="number" id="hc-bmm-ogun" value="8" min="1" max="12">
        </div>
        <button class="hc-btn" onclick="hcBebekMamaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bebek-mama-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">Öğün Başı Mama Miktarı</span>
                <div class="hc-result-value" id="hc-res-bmm-miktar">-</div>
            </div>
        </div>
    </div>
    <?php
}
