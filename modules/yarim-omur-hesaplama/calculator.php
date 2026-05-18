<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yarim_omur_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yarim-omur-hesaplama',
        HC_PLUGIN_URL . 'modules/yarim-omur-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yarim-omur-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yarim-omur-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yarim-omur-hesaplama">
        <div class="hc-cal-header">
            <h3>Yarım Ömür (Radyoaktif Bozunma) Hesaplama</h3>
            <p>Radyoaktif maddelerin yarılanma ömrüne göre bozunma hızı, başlangıç miktarı, kalan miktar veya geçen süre parametrelerini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-yoh-solve">Hesaplanacak Değer</label>
            <select id="hc-yoh-solve" class="hc-select" onchange="hcYarimOmurSolveDegisti()">
                <option value="remaining">Kalan Miktar (N)</option>
                <option value="initial">Başlangıç Miktarı (N₀)</option>
                <option value="halflife">Yarım Ömür (T₁/₂)</option>
                <option value="time">Geçen Süre (t)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-yoh-initial-group">
            <label for="hc-yoh-initial">Başlangıç Miktarı (gram veya adet - N₀)</label>
            <input type="number" id="hc-yoh-initial" class="hc-input" placeholder="örn. 100" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-yoh-remaining-group" style="display:none;">
            <label for="hc-yoh-remaining">Kalan Miktar (gram veya adet - N)</label>
            <input type="number" id="hc-yoh-remaining" class="hc-input" placeholder="örn. 25" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-yoh-halflife-group">
            <label for="hc-yoh-halflife">Yarılanma Ömrü (T₁/₂)</label>
            <input type="number" id="hc-yoh-halflife" class="hc-input" placeholder="örn. 5730 (Karbon-14)" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-yoh-time-group">
            <label for="hc-yoh-time">Geçen Süre (t)</label>
            <input type="number" id="hc-yoh-time" class="hc-input" placeholder="örn. 11460" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-yoh-unit">Zaman Birimi</label>
            <select id="hc-yoh-unit" class="hc-select">
                <option value="yıl">Yıl</option>
                <option value="gün">Gün</option>
                <option value="saat">Saat</option>
                <option value="dakika">Dakika</option>
                <option value="saniye">Saniye</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcYarimOmurHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-yarim-omur-hesaplama-result">
            <div class="hc-result-title">Radyoaktif Bozunma Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label" id="hc-yoh-res-label">Kalan Miktar (N):</span>
                <span class="hc-result-value" id="hc-yoh-res-val">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Bozunan Miktar:</span>
                <span class="hc-result-value" id="hc-yoh-res-decayed">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Bozunma Yüzdesi:</span>
                <span class="hc-result-value" id="hc-yoh-res-pct">-</span>
            </div>
            <div class="hc-result-desc" id="hc-yoh-desc"></div>
        </div>
    </div>
    <?php
}
