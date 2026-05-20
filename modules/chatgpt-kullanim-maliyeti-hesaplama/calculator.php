<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_chatgpt_kullanim_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-chatgpt-kullanim-maliyeti-hesaplama',
        HC_PLUGIN_URL . 'modules/chatgpt-kullanim-maliyeti-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-chatgpt-kullanim-maliyeti">
        <h3>ChatGPT Kullanım Maliyeti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cg-tur">Hesaplama Türü</label>
            <select id="hc-cg-tur" onchange="hcCgTurDegisti()">
                <option value="plus">ChatGPT Plus / Team Aboneliği</option>
                <option value="api">ChatGPT API (Kullandıkça Öde)</option>
            </select>
        </div>

        <div id="hc-cg-plus-options" class="hc-form-group">
            <div class="hc-form-group">
                <label for="hc-cg-plus-fiyat">Aylık Abonelik Ücreti ($)</label>
                <input type="number" id="hc-cg-plus-fiyat" min="1" value="20" />
                <small style="color:#666;font-size:12px;">Plus için 20 $, Team için 25 $ (kullanıcı başı).</small>
            </div>
            <div class="hc-form-group">
                <label for="hc-cg-kdv">KDV / Vergi Oranı (%)</label>
                <input type="number" id="hc-cg-kdv" min="0" max="100" value="20" />
            </div>
        </div>

        <div id="hc-cg-api-options" style="display: none; background:#f4f7fa; padding:15px; border-radius:8px; margin-bottom:15px;">
            <div class="hc-form-group">
                <label for="hc-cg-model">Kullanılan Model</label>
                <select id="hc-cg-model">
                    <option value="gpt-4o">GPT-4o (Girdi: 2.50$/1M, Çıktı: 10.00$/1M)</option>
                    <option value="gpt-4o-mini">GPT-4o mini (Girdi: 0.15$/1M, Çıktı: 0.60$/1M)</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-cg-soru">Günlük Ortalama Soru (Prompt) Sayısı</label>
                <input type="number" id="hc-cg-soru" min="1" value="50" />
            </div>
            <div class="hc-form-group">
                <label for="hc-cg-kelime-in">Soru Başına Ortalama Girdi Kelime Sayısı</label>
                <input type="number" id="hc-cg-kelime-in" min="1" value="150" />
            </div>
            <div class="hc-form-group">
                <label for="hc-cg-kelime-out">Cevap Başına Ortalama Çıktı Kelime Sayısı</label>
                <input type="number" id="hc-cg-kelime-out" min="1" value="300" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-cg-dolar">Dolar Kuru (USD/TRY)</label>
            <input type="number" id="hc-cg-dolar" min="1" step="0.01" value="36.00" />
        </div>

        <button class="hc-btn" onclick="hcChatgptKullanimMaliyetiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-chatgpt-kullanim-maliyeti-result">
            <table>
                <tr>
                    <td>Aylık Toplam Maliyet ($)</td>
                    <td><strong id="hc-cg-res-usd" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
                <tr>
                    <td>Aylık Toplam Maliyet (₺)</td>
                    <td><strong class="hc-result-value" id="hc-cg-res-try" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr id="hc-cg-res-soru-maliyeti-row" style="display: none;">
                    <td>Soru Başına Ortalama Maliyet</td>
                    <td><strong id="hc-cg-res-soru-maliyeti">-</strong></td>
                </tr>
                <tr>
                    <td>Yıllık Toplam Projeksiyon (₺)</td>
                    <td><strong id="hc-cg-res-yillik">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
