<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ihbar_tazminati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ihbar-tazminati-hesaplama',
        HC_PLUGIN_URL . 'modules/ihbar-tazminati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ihbar-tazminati-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ihbar-tazminati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ihbar-tazminati-hesaplama">
        <div class="hc-header">
            <h3>İhbar Tazminatı Hesaplama (2026)</h3>
            <p>Çalışma sürenize göre hak kazanacağınız ihbar tazminatını hesaplayın.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-giris">İşe Giriş Tarihi</label>
                <input type="date" id="hc-giris">
            </div>

            <div class="hc-form-group">
                <label for="hc-cikis">İşten Ayrılış Tarihi</label>
                <input type="date" id="hc-cikis">
            </div>

            <div class="hc-form-group">
                <label for="hc-maas">Aylık Brüt Maaş (TL)</label>
                <div class="hc-input-wrapper">
                    <input type="number" id="hc-maas" placeholder="Örn: 40.000" min="0">
                    <span class="hc-input-icon">₺</span>
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

        <button class="hc-btn" onclick="hcIhbarTazminatiHesapla()">
            <span>Hesapla</span>
            <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M10,17L5,12L6.41,10.59L10,14.17L17.59,6.58L19,8L10,17Z"/></svg>
        </button>

        <div class="hc-result" id="hc-ihbar-tazminati-result">
            <div class="hc-result-header">Hesaplama Sonucu</div>
            <div class="hc-result-main">
                <div class="hc-result-item primary">
                    <span>Net İhbar Tazminatı</span>
                    <strong id="hc-res-net">0,00 ₺</strong>
                </div>
            </div>
            <div class="hc-result-details">
                <div class="hc-result-item">
                    <span>İhbar Süresi</span>
                    <span id="hc-res-sure">-</span>
                </div>
                <div class="hc-result-item">
                    <span>Brüt İhbar Tazminatı</span>
                    <span id="hc-res-brut">0,00 ₺</span>
                </div>
                <div class="hc-result-item">
                    <span>Gelir Vergisi</span>
                    <span id="hc-res-vergi">0,00 ₺</span>
                </div>
                <div class="hc-result-item">
                    <span>Damga Vergisi (%0,759)</span>
                    <span id="hc-res-damga">0,00 ₺</span>
                </div>
            </div>
            <div class="hc-result-footer">
                * İhbar tazminatı üzerinden SGK kesintisi yapılmaz. Hesaplamalar 2026 yasal vergi oranlarına göre yapılmıştır.
            </div>
        </div>
    </div>
    <?php
}
