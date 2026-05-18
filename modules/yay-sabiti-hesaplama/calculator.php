<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yay_sabiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yay-sabiti-hesaplama',
        HC_PLUGIN_URL . 'modules/yay-sabiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yay-sabiti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yay-sabiti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yay-sabiti-hesaplama">
        <div class="hc-cal-header">
            <h3>Yay Sabiti (Hooke Yasası) Hesaplama</h3>
            <p>Bir yay sisteminde; uygulanan mekanik kuvvet, yayın uzama/sıkışma miktarı veya yayın sertlik katsayısı (yay sabiti) parametrelerini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-ysh-solve">Hesaplanacak Parametre</label>
            <select id="hc-ysh-solve" class="hc-select" onchange="hcYaySabitiSolveDegisti()">
                <option value="k">Yay Sabiti (k - N/m)</option>
                <option value="f">Uygulanan Kuvvet (F - Newton)</option>
                <option value="x">Uzama / Sıkışma Miktarı (x)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-ysh-k-group" style="display:none;">
            <label for="hc-ysh-k">Yay Sabiti (k - Newton/metre - N/m)</label>
            <input type="number" id="hc-ysh-k" class="hc-input" placeholder="örn. 500" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-ysh-f-group">
            <label for="hc-ysh-f">Uygulanan Kuvvet (F - Newton - N)</label>
            <input type="number" id="hc-ysh-f" class="hc-input" placeholder="örn. 50" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-ysh-x-group">
            <label for="hc-ysh-x">Uzama veya Sıkışma Miktarı (x)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-ysh-x-val" class="hc-input" placeholder="Miktar" step="any" min="0" value="10">
                <select id="hc-ysh-x-unit" class="hc-select" style="max-width: 130px;">
                    <option value="cm">Santimetre (cm)</option>
                    <option value="m">Metre (m)</option>
                    <option value="mm">Milimetre (mm)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcYaySabitiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-yay-sabiti-hesaplama-result">
            <div class="hc-result-title">Mekanik Yay Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label" id="hc-ysh-res-label">Hesaplanan Yay Sabiti:</span>
                <span class="hc-result-value" id="hc-ysh-res-val">-</span>
            </div>
            <div class="hc-result-desc" id="hc-ysh-desc"></div>
        </div>
    </div>
    <?php
}
