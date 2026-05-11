<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_damga_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-damga-vergisi',
        HC_PLUGIN_URL . 'modules/damga-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-damga-vergisi-css',
        HC_PLUGIN_URL . 'modules/damga-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-damga-vergi">
        <h3>Damga Vergisi Hesaplama (2026)</h3>
        <div class="hc-form-group">
            <label for="hc-dv-amount">Sözleşme / Kağıt Bedeli (₺)</label>
            <input type="number" id="hc-dv-amount" placeholder="Örn: 100.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-dv-type">Kağıt Türü</label>
            <select id="hc-dv-type">
                <option value="0.00948">Belli Parayı İhtiva Eden Kağıtlar (Binde 9,48)</option>
                <option value="0.00189">Kira Sözleşmeleri (Binde 1,89)</option>
                <option value="0.00759">Tahkimnameler (Binde 7,59)</option>
                <option value="0.000">Sadece Sabit Damga Vergisi</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDamgaVergisiHesapla()">Vergi Hesapla</button>
        <div class="hc-result" id="hc-dv-result">
            <div class="hc-result-item">
                <span>Hesaplanan Damga Vergisi:</span>
                <strong class="hc-result-value" id="hc-dv-res-total">-</strong>
            </div>
            <p class="hc-small-text">Sözleşmelerde damga vergisi üst sınırı (2026) yaklaşık 25-30 Milyon TL civarındadır.</p>
        </div>
    </div>
    <?php
}
