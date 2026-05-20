<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_youtube_reklam_geliri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-youtube-reklam-geliri-hesaplama',
        HC_PLUGIN_URL . 'modules/youtube-reklam-geliri-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-youtube-reklam-geliri">
        <h3>YouTube Reklam Geliri Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ytr-izlenme">Günlük Ortalama İzlenme Sayısı</label>
            <input type="number" id="hc-ytr-izlenme" min="1" placeholder="örn: 10000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ytr-para-birimi">RPM Para Birimi</label>
            <select id="hc-ytr-para-birimi" onchange="hcYtReklamParaBirimiDegisti()">
                <option value="TRY">Türk Lirası (₺)</option>
                <option value="USD">Amerikan Doları ($)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ytr-rpm">Tahmini RPM (1.000 İzlenme Başına Gelir)</label>
            <input type="number" id="hc-ytr-rpm" min="0.01" step="0.01" placeholder="örn: 35.00" value="35.00" />
            <small style="color:#666;font-size:12px;">Türkiye ortalaması genelde 20 ₺ - 80 ₺ arasındadır. Global izlenmelerde 2 $ - 10 $ civarıdır.</small>
        </div>

        <div class="hc-form-group" id="hc-ytr-dolar-gr" style="display: none;">
            <label for="hc-ytr-dolar">Dolar Kuru (USD/TRY)</label>
            <input type="number" id="hc-ytr-dolar" min="1" step="0.01" value="36.00" />
        </div>

        <button class="hc-btn" onclick="hcYoutubeReklamGeliriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-youtube-reklam-geliri-result">
            <table>
                <tr>
                    <td>Günlük Tahmini Kazanç</td>
                    <td><strong id="hc-ytr-res-gunluk">-</strong></td>
                </tr>
                <tr>
                    <td>Aylık Tahmini Kazanç (30 Gün)</td>
                    <td><strong class="hc-result-value" id="hc-ytr-res-aylik" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Yıllık Tahmini Kazanç (365 Gün)</td>
                    <td><strong id="hc-ytr-res-yillik">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
