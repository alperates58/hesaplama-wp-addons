<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kira_artis_orani_yasal_sinir_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kira-artis-orani-yasal-sinir',
        HC_PLUGIN_URL . 'modules/kira-artis-orani-yasal-sinir-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kira-artis-orani-yasal-sinir-css',
        HC_PLUGIN_URL . 'modules/kira-artis-orani-yasal-sinir-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kira-artis-orani-yasal-sinir-hesaplama">
        <h3>Kira Artış Oranı (Yasal Sınır) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kay-kira">Mevcut Aylık Kira Bedeli (₺)</label>
            <input type="number" id="hc-kay-kira" placeholder="Örn: 15000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kay-tur">Gayrimenkul Türü</label>
            <select id="hc-kay-tur">
                <option value="konut">Konut (Mesken)</option>
                <option value="isyeri">İş Yeri / Ofis / Dükkan</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-kay-ay">Artış Dönemi / Ayı (2026)</label>
            <select id="hc-kay-ay">
                <option value="0.385">Ocak 2026 (%38.50)</option>
                <option value="0.362">Şubat 2026 (%36.20)</option>
                <option value="0.344">Mart 2026 (%34.40)</option>
                <option value="0.321">Nisan 2026 (%32.10)</option>
                <option value="0.302">Mayıs 2026 (%30.20)</option>
                <option value="0.285">Haziran 2026 (%28.50)</option>
                <option value="0.270">Temmuz 2026 (%27.00 - Tahmini)</option>
                <option value="0.255">Ağustos 2026 (%25.50 - Tahmini)</option>
                <option value="0.240">Eylül 2026 (%24.00 - Tahmini)</option>
                <option value="0.230">Ekim 2026 (%23.00 - Tahmini)</option>
                <option value="0.220">Kasım 2026 (%22.00 - Tahmini)</option>
                <option value="0.210">Aralık 2026 (%21.00 - Tahmini)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKiraArtisYasalSinirHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kay-result">
            <h4>Yasal Sınır Artış Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Mevcut Kira</td>
                        <td id="hc-kay-res-eski">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Yasal Sınır Artış Oranı (TÜFE 12 Aylık Ort.)</td>
                        <td id="hc-kay-res-oran">%0</td>
                    </tr>
                    <tr>
                        <td>Yasal Maksimum Artış Tutarı</td>
                        <td id="hc-kay-res-artis" style="color:var(--hc-front-green);">+0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Yasal Sınırda Yeni Kira Bedeli</td>
                        <td id="hc-kay-res-yeni">0 ₺</td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-top:14px; padding:10px; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:8px; font-size:12px; color:#166534; line-height:1.4;">
                * Bilgi: Konut kiralarındaki %25 artış tavanı 1 Temmuz 2024 itibarıyla sona ermiştir. Artık hem konutlarda hem de iş yerlerinde yasal tavan sınır, yenilenen ayda açıklanan 12 aylık TÜFE ortalamasıdır. Ev sahipleri bu oranının üzerinde artış yapamaz.
            </div>
        </div>
    </div>
    <?php
}