<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gelir_vergisi_hesaplama_2026( $atts ) {
    wp_enqueue_script(
        'hc-gelir-vergisi-hesaplama-2026',
        HC_PLUGIN_URL . 'modules/gelir-vergisi-hesaplama-2026/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gelir-vergisi-hesaplama-2026-css',
        HC_PLUGIN_URL . 'modules/gelir-vergisi-hesaplama-2026/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gelir-vergisi-2026">
        <h3>Gelir Vergisi Hesaplama (2026)</h3>
        <div class="hc-form-group">
            <label for="hc-gv-type">Gelir Türü</label>
            <select id="hc-gv-type">
                <option value="wage">Ücret Geliri (Maaş)</option>
                <option value="non-wage">Diğer Gelirler (Kira, Ticari vb.)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-gv-matrah">Yıllık Toplam Vergi Matrahı (₺)</label>
            <input type="number" id="hc-gv-matrah" placeholder="Örn: 500.000">
        </div>
        <button class="hc-btn" onclick="hcGelirVergisi2026Hesapla()">Vergiyi Hesapla</button>
        <div class="hc-result" id="hc-gv-result">
            <div class="hc-result-item">
                <span>Hesaplanan Gelir Vergisi:</span>
                <strong class="hc-result-value" id="hc-gv-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Efektif Vergi Oranı:</span>
                <strong id="hc-gv-rate">-</strong>
            </div>
            <p class="hc-small-text">2026 yılı yasal gelir vergisi dilimleri kullanılmıştır.</p>
        </div>
    </div>
    <?php
}
