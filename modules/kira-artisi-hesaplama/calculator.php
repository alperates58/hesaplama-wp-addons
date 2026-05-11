<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kira_artisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kira-artisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kira-artisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kira-artisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kira-artisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kira-artisi">
        <h3>Kira Artışı Hesaplama (TÜFE Bazlı)</h3>
        <div class="hc-form-group">
            <label for="hc-ka-current">Mevcut Kira Tutarı (₺)</label>
            <input type="number" id="hc-ka-current" placeholder="Örn: 20.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ka-rate">12 Aylık TÜFE Ortalaması (%)</label>
            <input type="number" id="hc-ka-rate" placeholder="Örn: 40.5" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcKiraArtisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ka-result">
            <div class="hc-result-item">
                <span>Artış Tutarı:</span>
                <strong id="hc-ka-diff">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Yeni Kira Tutarı:</span>
                <strong class="hc-result-value" id="hc-ka-new">-</strong>
            </div>
            <p class="hc-small-text">2026 yılı itibarıyla konut kiralarında yasal artış üst sınırı, TÜİK tarafından açıklanan 12 aylık TÜFE ortalamasıdır.</p>
        </div>
    </div>
    <?php
}
