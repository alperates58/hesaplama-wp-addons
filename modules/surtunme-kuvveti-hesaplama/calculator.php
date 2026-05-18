<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_surtunme_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-surtunme-kuvveti-hesaplama',
        HC_PLUGIN_URL . 'modules/surtunme-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-surtunme-kuvveti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/surtunme-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-surtunme-kuvveti-hesaplama">
        <div class="hc-cal-header">
            <h3>Sürtünme Kuvveti Hesaplama</h3>
            <p>Malzeme kombinasyonlarına ve dik normal kuvvete bağlı olarak cisimleri durduran veya harekete direnen sürtünme kuvvetlerini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-skk-preset">Yüzey Malzeme Çifti (Hazır Şablonlar)</label>
            <select id="hc-skk-preset" class="hc-select" onchange="hcSurtunmeKuvvetiSablonDegisti()">
                <option value="custom">Özel Katsayı Gir</option>
                <option value="rubber-concrete">Kauçuk - Beton (Lastik ve Yol) [μs=0.9, μk=0.7]</option>
                <option value="metal-metal-dry">Metal - Metal (Kuru) [μs=0.6, μk=0.4]</option>
                <option value="metal-metal-lubricated">Metal - Metal (Yağlı) [μs=0.15, μk=0.06]</option>
                <option value="wood-wood">Ahşap - Ahşap [μs=0.4, μk=0.2]</option>
                <option value="ice-ice">Buz - Buz [μs=0.1, μk=0.03]</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-skk-mus">Statik Sürtünme Katsayısı (μ_s)</label>
            <input type="number" id="hc-skk-mus" class="hc-input" value="0.5" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-skk-muk">Kinetik Sürtünme Katsayısı (μ_k)</label>
            <input type="number" id="hc-skk-muk" class="hc-input" value="0.4" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-skk-fn-mode">Normal Kuvvet Girişi</label>
            <select id="hc-skk-fn-mode" class="hc-select" onchange="hcSurtunmeKuvvetiNormalDegisti()">
                <option value="force">Normal Kuvveti Doğrudan Gir (N)</option>
                <option value="mass">Cisim Kütlesine Göre Hesapla (kg)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-skk-fn-val-group">
            <label for="hc-skk-fn">Normal Kuvvet (F_N - Newton - N)</label>
            <input type="number" id="hc-skk-fn" class="hc-input" placeholder="örn. 100" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-skk-m-val-group" style="display:none;">
            <label for="hc-skk-m">Cisim Kütlesi (m - kg)</label>
            <input type="number" id="hc-skk-m" class="hc-input" placeholder="örn. 10" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSurtunmeKuvvetiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-surtunme-kuvveti-hesaplama-result">
            <div class="hc-result-title">Sürtünme Kuvveti Değerleri</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Normal Kuvvet (F_N):</span>
                <span class="hc-result-value" id="hc-skk-res-fn">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Maksimum Statik Sürtünme (F_s):</span>
                <span class="hc-result-value" id="hc-skk-res-fs">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kinetik Sürtünme Kuvveti (F_k):</span>
                <span class="hc-result-value" id="hc-skk-res-fk">-</span>
            </div>
            <div class="hc-result-desc" id="hc-skk-desc"></div>
        </div>
    </div>
    <?php
}
