<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_surtunme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-surtunme-hesaplama',
        HC_PLUGIN_URL . 'modules/surtunme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-surtunme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/surtunme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-surtunme-hesaplama">
        <div class="hc-cal-header">
            <h3>Sürtünme Hesaplama (Kapsamlı)</h3>
            <p>Düz veya eğimli yüzeylerdeki cisimlerin kütlesi, yüzey açısı ve sürtünme katsayılarına göre sürtünme kuvvetlerini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sh-mode">Yüzey Türü</label>
            <select id="hc-sh-mode" class="hc-select" onchange="hcSurtunmeModuDegisti()">
                <option value="flat">Yatay Düz Zemin</option>
                <option value="incline">Eğimli Zemin (Rampa)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sh-m">Cisim Kütlesi (m - kilogram - kg)</label>
            <input type="number" id="hc-sh-m" class="hc-input" placeholder="örn. 10" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-sh-angle-group" style="display:none;">
            <label for="hc-sh-angle">Eğim Açısı (θ - Derece)</label>
            <input type="number" id="hc-sh-angle" class="hc-input" value="30" step="any" min="0" max="90">
        </div>

        <div class="hc-form-group">
            <label for="hc-sh-mus">Statik Sürtünme Katsayısı (μ_s)</label>
            <input type="number" id="hc-sh-mus" class="hc-input" value="0.5" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sh-muk">Kinetik Sürtünme Katsayısı (μ_k)</label>
            <input type="number" id="hc-sh-muk" class="hc-input" value="0.4" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSurtunmeHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-surtunme-hesaplama-result">
            <div class="hc-result-title">Sürtünme Kuvveti Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Normal Kuvvet (F_N):</span>
                <span class="hc-result-value" id="hc-sh-res-fn">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Maksimum Statik Sürtünme (F_s):</span>
                <span class="hc-result-value" id="hc-sh-res-fs">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kinetik Sürtünme Kuvveti (F_k):</span>
                <span class="hc-result-value" id="hc-sh-res-fk">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sh-desc"></div>
        </div>
    </div>
    <?php
}
