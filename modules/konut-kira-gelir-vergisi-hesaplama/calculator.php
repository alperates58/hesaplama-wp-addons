<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_konut_kira_gelir_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-konut-kira-gelir-vergisi',
        HC_PLUGIN_URL . 'modules/konut-kira-gelir-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-konut-kira-gelir-vergisi-css',
        HC_PLUGIN_URL . 'modules/konut-kira-gelir-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-konut-kira-gelir-vergisi-hesaplama">
        <h3>Konut Kira Gelir Vergisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kkgv-gelir">Yıllık Toplam Kira Geliri (₺)</label>
            <input type="number" id="hc-kkgv-gelir" placeholder="Örn: 180000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkgv-yil">Gelirin Elde Edildiği Vergi Yılı</label>
            <select id="hc-kkgv-yil">
                <option value="2026">2026 Yılı (Mart 2027'de Beyan Edilecek - İstisna: 58.000 ₺)</option>
                <option value="2025">2025 Yılı (Mart 2026'da Beyan Edilecek - İstisna: 47.000 ₺)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-kkgv-gider-turu">Gider Yöntemi</label>
            <select id="hc-kkgv-gider-turu" onchange="hcKiraVergisiGiderGuncelle()">
                <option value="goturu">Götürü Gider Yöntemi (%15 Standart İndirim)</option>
                <option value="gercek">Gerçek Gider Yöntemi (Fatura Belgeli Giderler)</option>
            </select>
        </div>
        <div class="hc-form-group" id="hc-kkgv-gercek-gider-row" style="display:none;">
            <label for="hc-kkgv-gercek-tutar">Yıllık Gerçek Gider Toplamı (Yalıtım, Faiz, Tamirat vb.) (₺)</label>
            <input type="number" id="hc-kkgv-gercek-tutar" placeholder="Belgelendirilebilir gider tutarı" min="0" value="0">
        </div>
        <button class="hc-btn" onclick="hcKiraVergisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kkgv-result">
            <div id="hc-kkgv-istisna-msg" style="display:none; padding:12px; border:1px solid #bbf7d0; background:#f0fdf4; color:#166534; border-radius:8px; font-size:14px; line-height:1.4;"></div>
            
            <div id="hc-kkgv-table-area">
                <h4>Kira Gelir Vergisi Beyan Raporu:</h4>
                <table>
                    <tbody>
                        <tr>
                            <td>Yıllık Kira Brüt Hasılat</td>
                            <td id="hc-kkgv-res-brut">0 ₺</td>
                        </tr>
                        <tr>
                            <td>Konut İstisna Tutarı</td>
                            <td id="hc-kkgv-res-istisna" style="color:var(--hc-front-red);">-0 ₺</td>
                        </tr>
                        <tr>
                            <td>Düşülen İzin Verilen Giderler</td>
                            <td id="hc-kkgv-res-gider" style="color:var(--hc-front-red);">-0 ₺</td>
                        </tr>
                        <tr style="font-weight:bold;">
                            <td>Vergi Matrahı (Vergilendirilecek Kısım)</td>
                            <td id="hc-kkgv-res-matrah">0 ₺</td>
                        </tr>
                        <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                            <td>Hesaplanan Gelir Vergisi</td>
                            <td id="hc-kkgv-res-vergi">0 ₺</td>
                        </tr>
                        <tr style="font-size:12px; color:#64748b;">
                            <td>Damga Vergisi (2026 Maktu)</td>
                            <td id="hc-kkgv-res-damga">650 ₺</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}