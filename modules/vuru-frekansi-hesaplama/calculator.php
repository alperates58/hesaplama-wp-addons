<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vuru_frekansi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vuru-frekansi-hesaplama',
        HC_PLUGIN_URL . 'modules/vuru-frekansi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vuru-frekansi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/vuru-frekansi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vuru-frekansi-hesaplama">
        <div class="hc-cal-header">
            <h3>Vuru Frekansı (Aşım / Beat) Hesaplama</h3>
            <p>Birbirine yakın frekanslara sahip iki ses veya dalga kaynağının girişim yapmasıyla ortaya çıkan periyodik genlik salınımının (vuru frekansının) ve duyulan ortalama frekansın analizini yapar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-vuf-f1">1. Dalga Frekansı (f₁ - Hertz - Hz)</label>
            <input type="number" id="hc-vuf-f1" class="hc-input" placeholder="örn. 440 (La notası)" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-vuf-f2">2. Dalga Frekansı (f₂ - Hertz - Hz)</label>
            <input type="number" id="hc-vuf-f2" class="hc-input" placeholder="örn. 444" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcVuruFrekansiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-vuru-frekansi-hesaplama-result">
            <div class="hc-result-title">Akustik Girişim Analizi</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Vuru Frekansı (f_vuru):</span>
                <span class="hc-result-value" id="hc-vuf-res-beat">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Duyulan Ortalama Frekans (f_ort):</span>
                <span class="hc-result-value" id="hc-vuf-res-avg">-</span>
            </div>
            <div class="hc-result-desc" id="hc-vuf-desc"></div>
        </div>
    </div>
    <?php
}
