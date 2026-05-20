<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_youtube_cpm_gelir_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-youtube-cpm-gelir-hesaplama',
        HC_PLUGIN_URL . 'modules/youtube-cpm-gelir-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-youtube-cpm-gelir">
        <h3>YouTube CPM Gelir Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ytc-izlenme">Toplam İzlenme Sayısı</label>
            <input type="number" id="hc-ytc-izlenme" min="1" placeholder="örn: 100000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ytc-reklam-orani">Reklam Gösterim Oranı (%)</label>
            <input type="number" id="hc-ytc-reklam-orani" min="0" max="100" value="65" />
            <small style="color:#666;font-size:12px;">Her izlenmede reklam çıkmaz. Genelde izlenmelerin %50 - %80'inde reklam gösterilir.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-ytc-para-birimi">CPM Para Birimi</label>
            <select id="hc-ytc-para-birimi" onchange="hcYtCpmParaBirimiDegisti()">
                <option value="TRY">Türk Lirası (₺)</option>
                <option value="USD">Amerikan Doları ($)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ytc-cpm">CPM Değeri (1.000 Reklam Gösterimi Başına Brüt Ücret)</label>
            <input type="number" id="hc-ytc-cpm" min="0.01" step="0.01" value="50.00" />
            <small style="color:#666;font-size:12px;">Reklamverenin ödediği brüt tutar.</small>
        </div>

        <div class="hc-form-group" id="hc-ytc-dolar-gr" style="display: none;">
            <label for="hc-ytc-dolar">Dolar Kuru (USD/TRY)</label>
            <input type="number" id="hc-ytc-dolar" min="1" step="0.01" value="36.00" />
        </div>

        <button class="hc-btn" onclick="hcYoutubeCpmGelirHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-youtube-cpm-gelir-result">
            <table>
                <tr>
                    <td>Tahmini Reklam Gösterimi</td>
                    <td><strong id="hc-ytc-res-gosterim">-</strong></td>
                </tr>
                <tr>
                    <td>Toplam Brüt Reklam Geliri</td>
                    <td><strong id="hc-ytc-res-brut">-</strong></td>
                </tr>
                <tr>
                    <td>YouTube Payı (%45 Kesinti)</td>
                    <td><strong id="hc-ytc-res-kesinti" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Yayıncı Net Geliri (%55 Pay)</td>
                    <td><strong class="hc-result-value" id="hc-ytc-res-net" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
