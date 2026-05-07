<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kidem_tazminati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kidem-tazminati-hesaplama',
        HC_PLUGIN_URL . 'modules/kidem-tazminati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kidem-tazminati-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kidem-tazminati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kidem-tazminati-hesaplama">
        <div class="hc-header">
            <h3>Kıdem Tazminatı Hesaplama (2026)</h3>
            <p>İşten ayrılma durumunda hak kazanacağınız tazminatı hesaplayın.</p>
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
                <label for="hc-maas">Son Aylık Brüt Maaş (TL)</label>
                <div class="hc-input-wrapper">
                    <input type="number" id="hc-maas" placeholder="Örn: 50.000" min="0">
                    <span class="hc-input-icon">₺</span>
                </div>
            </div>

            <div class="hc-form-group">
                <label for="hc-ek-odeme">Diğer Brüt Ek Ödemeler (TL)</label>
                <div class="hc-input-wrapper">
                    <input type="number" id="hc-ek-odeme" placeholder="Yemek, yol vb." min="0">
                    <span class="hc-input-icon">₺</span>
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcKidemTazminatiHesapla()">
            <span>Hesapla</span>
            <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M10,17L5,12L6.41,10.59L10,14.17L17.59,6.58L19,8L10,17Z"/></svg>
        </button>

        <div class="hc-result" id="hc-kidem-tazminati-result">
            <div class="hc-result-header">Hesaplama Sonucu</div>
            <div class="hc-result-main">
                <div class="hc-result-item primary">
                    <span>Net Kıdem Tazminatı</span>
                    <strong id="hc-res-net">0,00 ₺</strong>
                </div>
            </div>
            <div class="hc-result-details">
                <div class="hc-result-item">
                    <span>Toplam Çalışma Süresi</span>
                    <span id="hc-res-sure">-</span>
                </div>
                <div class="hc-result-item">
                    <span>Hesaba Esas Brüt Ücret</span>
                    <span id="hc-res-esas-brut">0,00 ₺</span>
                </div>
                <div class="hc-result-item">
                    <span>Brüt Kıdem Tazminatı</span>
                    <span id="hc-res-brut">0,00 ₺</span>
                </div>
                <div class="hc-result-item">
                    <span>Damga Vergisi (%0,759)</span>
                    <span id="hc-res-damga">0,00 ₺</span>
                </div>
            </div>
            <div class="hc-result-footer">
                * 2026 yılı 1. dönem kıdem tazminatı tavanı (64.948,77 TL) uygulanmıştır. Hesaplamalar bilgilendirme amaçlıdır.
            </div>
        </div>
    </div>
    <?php
}
