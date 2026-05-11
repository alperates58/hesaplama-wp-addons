<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_damga_vergisi_hesaplama_2026( $atts ) {
    wp_enqueue_script(
        'hc-damga-vergisi-hesaplama-2026',
        HC_PLUGIN_URL . 'modules/damga-vergisi-hesaplama-2026/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-damga-vergisi-hesaplama-2026-css',
        HC_PLUGIN_URL . 'modules/damga-vergisi-hesaplama-2026/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-damga-vergisi-2026">
        <h3>Damga Vergisi Hesaplama (2026)</h3>
        <div class="hc-form-group">
            <label for="hc-dv-type">Kağıt / Sözleşme Türü</label>
            <select id="hc-dv-type">
                <option value="0.00948">Sözleşmeler (Belli parayı ihtiva eden %0,948)</option>
                <option value="0.00759">Ücret Ödemeleri (Maaşlar %0,759)</option>
                <option value="0.00189">Kira Sözleşmeleri (Kira bedeli üzerinden %0,189)</option>
                <option value="0.00948">Tahkimnameler ve Sulhnameler (%0,948)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-dv-amount">Sözleşme / Ödeme Tutarı (₺)</label>
            <input type="number" id="hc-dv-amount" placeholder="Örn: 100.000">
        </div>
        <button class="hc-btn" onclick="hcDamgaVergisi2026Hesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dv-result">
            <div class="hc-result-item">
                <span>Hesaplanan Damga Vergisi:</span>
                <strong class="hc-result-value" id="hc-dv-tax">-</strong>
            </div>
            <p class="hc-small-text">Belli bir parayı içermeyen maktu damga vergileri bu hesaplamaya dahil değildir.</p>
        </div>
    </div>
    <?php
}
