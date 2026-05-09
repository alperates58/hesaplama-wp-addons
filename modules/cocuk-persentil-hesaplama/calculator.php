<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuk_persentil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cocuk-persentil',
        HC_PLUGIN_URL . 'modules/cocuk-persentil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cocuk-persentil-css',
        HC_PLUGIN_URL . 'modules/cocuk-persentil-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cocuk-persentil">
        <h3>Çocuk ve Ergen Persentil Hesaplama (2-18 Yaş)</h3>
        
        <div class="hc-form-group">
            <label for="hc-cp-cinsiyet">Cinsiyet</label>
            <select id="hc-cp-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kız</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-cp-yas">Yaş</label>
            <input type="number" id="hc-cp-yas" placeholder="Örn: 10" min="2" max="18">
        </div>

        <div class="hc-form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="hc-form-group">
                <label for="hc-cp-kilo">Kilo (kg)</label>
                <input type="number" id="hc-cp-kilo" placeholder="Örn: 35" step="0.1">
            </div>

            <div class="hc-form-group">
                <label for="hc-cp-boy">Boy (cm)</label>
                <input type="number" id="hc-cp-boy" placeholder="Örn: 140" step="0.5">
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcCocukPersentilHesapla()">Persentil Hesapla</button>
        
        <div class="hc-result" id="hc-cocuk-persentil-result">
            <div class="hc-persentil-summary">
                <div class="hc-persentil-card">
                    <span class="hc-p-label">Kilo</span>
                    <strong class="hc-p-value" id="hc-res-cp-kilo">-</strong>
                </div>
                <div class="hc-persentil-card">
                    <span class="hc-p-label">Boy</span>
                    <strong class="hc-p-value" id="hc-res-cp-boy">-</strong>
                </div>
                <div class="hc-persentil-card">
                    <span class="hc-p-label">VKI (BMI)</span>
                    <strong class="hc-p-value" id="hc-res-cp-bmi">-</strong>
                </div>
            </div>
            
            <div id="hc-cp-yorum" class="hc-persentil-yorum">
            </div>

            <div style="margin-top: 20px; font-size: 13px; color: var(--hc-front-muted); line-height: 1.5; padding: 12px; background: #f8fafc; border-radius: 10px;">
                <strong>Bilgi:</strong> 2-18 yaş grubunda gelişim değerlendirmesi Boy ve Kilo persentillerinin yanı sıra Vücut Kitle İndeksi (VKI) persentili ile yapılır.
            </div>
        </div>
    </div>
    <?php
}
