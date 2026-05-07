<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yillik_izin_ucreti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yillik-izin-ucreti-hesaplama',
        HC_PLUGIN_URL . 'modules/yillik-izin-ucreti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yillik-izin-ucreti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yillik-izin-ucreti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yillik-izin-ucreti-hesaplama">
        <div class="hc-header">
            <h3>Yıllık İzin Ücreti Hesaplama (2026)</h3>
            <p>Kullanılmayan izin günlerinizin net bedelini öğrenin.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-maas">Aylık Brüt Maaş (TL)</label>
                <div class="hc-input-wrapper">
                    <input type="number" id="hc-maas" placeholder="Örn: 45.000" min="0">
                    <span class="hc-input-icon">₺</span>
                </div>
            </div>

            <div class="hc-form-group">
                <label for="hc-izin-gunu">Kullanılmayan İzin Günü</label>
                <div class="hc-input-wrapper">
                    <input type="number" id="hc-izin-gunu" placeholder="Örn: 14" min="0">
                    <span class="hc-input-icon">Gün</span>
                </div>
            </div>

            <div class="hc-form-group">
                <label for="hc-vergi-dilimi">Gelir Vergisi Dilimi</label>
                <select id="hc-vergi-dilimi">
                    <option value="0.15">%15 (İlk Dilim)</option>
                    <option value="0.20">%20</option>
                    <option value="0.27">%27</option>
                    <option value="0.35">%35</option>
                    <option value="0.40">%40</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcYillikIzinUcretiHesapla()">
            <span>Hesapla</span>
            <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M10,17L5,12L6.41,10.59L10,14.17L17.59,6.58L19,8L10,17Z"/></svg>
        </button>

        <div class="hc-result" id="hc-yillik-izin-ucreti-result">
            <div class="hc-result-header">Hesaplama Sonucu</div>
            <div class="hc-result-main">
                <div class="hc-result-item primary">
                    <span>Net Ödenecek Tutar</span>
                    <strong id="hc-res-net">0,00 ₺</strong>
                </div>
            </div>
            <div class="hc-result-details">
                <div class="hc-result-item">
                    <span>Brüt İzin Ücreti</span>
                    <span id="hc-res-brut">0,00 ₺</span>
                </div>
                <div class="hc-result-item">
                    <span>SGK Kesintisi (%15)</span>
                    <span id="hc-res-sgk">0,00 ₺</span>
                </div>
                <div class="hc-result-item">
                    <span>Gelir Vergisi</span>
                    <span id="hc-res-vergi">0,00 ₺</span>
                </div>
                <div class="hc-result-item">
                    <span>Damga Vergisi</span>
                    <span id="hc-res-damga">0,00 ₺</span>
                </div>
            </div>
            <div class="hc-result-footer">
                * Bu hesaplama 2026 yılı vergi parametrelerine göre tahmini olarak yapılmıştır. Kesin sonuçlar için bordronuzu kontrol ediniz.
            </div>
        </div>
    </div>
    <?php
}
