<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_surtunme_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-surtunme-katsayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/surtunme-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-surtunme-katsayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/surtunme-katsayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-surtunme-katsayisi-hesaplama">
        <div class="hc-cal-header">
            <h3>Sürtünme Katsayısı Hesaplama</h3>
            <p>Kuvvet değerlerine veya eğim açısına bağlı olarak yüzeyin sürtünme katsayısını (μ) hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sk-mode">Hesaplama Yöntemi</label>
            <select id="hc-sk-mode" class="hc-select" onchange="hcSurtunmeKatsayisiModDegisti()">
                <option value="forces">Kuvvetlere Göre (Sürtünme & Normal Kuvvet)</option>
                <option value="angle">Kayma Açısına Göre (Eğim Açısı)</option>
            </select>
        </div>

        <!-- Kuvvetler için -->
        <div id="hc-sk-forces-group">
            <div class="hc-form-group">
                <label for="hc-sk-ff">Sürtünme Kuvveti (F_f - Newton - N)</label>
                <input type="number" id="hc-sk-ff" class="hc-input" placeholder="örn. 25" step="any" min="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-sk-fn">Normal Kuvvet (F_N - Newton - N)</label>
                <input type="number" id="hc-sk-fn" class="hc-input" placeholder="örn. 50" step="any" min="0">
            </div>
        </div>

        <!-- Açı için -->
        <div id="hc-sk-angle-group" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-sk-theta">Kritik Kayma / Eğim Açısı (θ - Derece)</label>
                <input type="number" id="hc-sk-theta" class="hc-input" placeholder="örn. 20" step="any" min="0" max="89">
            </div>
        </div>

        <button class="hc-btn" onclick="hcSurtunmeKatsayisiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-surtunme-katsayisi-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Sürtünme Katsayısı (μ)</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Sürtünme Katsayısı (μ):</span>
                <span class="hc-result-value" id="hc-sk-res-mu">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sk-desc"></div>
        </div>
    </div>
    <?php
}
