<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_podcast_reklam_geliri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-podcast-reklam-geliri-hesaplama',
        HC_PLUGIN_URL . 'modules/podcast-reklam-geliri-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-podcast-reklam">
        <h3>Podcast Reklam Geliri Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pr-dinlenme">Bölüm Başına Ortalama Dinlenme Sayısı</label>
            <input type="number" id="hc-pr-dinlenme" min="1" placeholder="örn: 5000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-pr-bolum">Aylık Yayınlanan Bölüm Sayısı</label>
            <input type="number" id="hc-pr-bolum" min="1" value="4" />
        </div>

        <div class="hc-form-group">
            <label for="hc-pr-para-birimi">CPM Para Birimi</label>
            <select id="hc-pr-para-birimi" onchange="hcPrParaBirimiDegisti()">
                <option value="TRY">Türk Lirası (₺)</option>
                <option value="USD">Amerikan Doları ($)</option>
            </select>
        </div>

        <div style="background:#f4f7fa; padding:15px; border-radius:8px; margin-bottom:15px;">
            <h4 style="margin-top:0; margin-bottom:10px; font-size:14px;">Reklam Yerleşimleri ve 1.000 Dinlenme Başı Gelir (CPM)</h4>
            
            <div class="hc-form-group" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                <label style="flex:1;">Pre-Roll (Başlangıç Reklamı)</label>
                <div style="display:flex; align-items:center; gap:5px;">
                    <input type="number" id="hc-pr-pre-adet" min="0" max="2" value="1" style="width:60px;" /> adet, CPM:
                    <input type="number" id="hc-pr-pre-cpm" min="0" value="75.00" style="width:80px;" />
                </div>
            </div>

            <div class="hc-form-group" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
                <label style="flex:1;">Mid-Roll (Orta Kısım Reklamı)</label>
                <div style="display:flex; align-items:center; gap:5px;">
                    <input type="number" id="hc-pr-mid-adet" min="0" max="3" value="1" style="width:60px;" /> adet, CPM:
                    <input type="number" id="hc-pr-mid-cpm" min="0" value="100.00" style="width:80px;" />
                </div>
            </div>

            <div class="hc-form-group" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0;">
                <label style="flex:1;">Post-Roll (Bitiş Reklamı)</label>
                <div style="display:flex; align-items:center; gap:5px;">
                    <input type="number" id="hc-pr-post-adet" min="0" max="2" value="0" style="width:60px;" /> adet, CPM:
                    <input type="number" id="hc-pr-post-cpm" min="0" value="50.00" style="width:80px;" />
                </div>
            </div>
        </div>

        <div class="hc-form-group" id="hc-pr-dolar-gr" style="display: none;">
            <label for="hc-pr-dolar">Dolar Kuru (USD/TRY)</label>
            <input type="number" id="hc-pr-dolar" min="1" step="0.01" value="36.00" />
        </div>

        <button class="hc-btn" onclick="hcPodcastReklamGeliriHesapla()">Gelir Hesapla</button>

        <div class="hc-result" id="hc-podcast-reklam-result">
            <table>
                <tr>
                    <td>Bölüm Başı Reklam Gösterimi</td>
                    <td><strong id="hc-pr-res-gosterim">-</strong></td>
                </tr>
                <tr>
                    <td>Bölüm Başı Toplam Brüt Gelir</td>
                    <td><strong id="hc-pr-res-bolum">-</strong></td>
                </tr>
                <tr>
                    <td>Aylık Tahmini Gelir (Brüt)</td>
                    <td><strong class="hc-result-value" id="hc-pr-res-aylik" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Yıllık Tahmini Gelir (Brüt)</td>
                    <td><strong id="hc-pr-res-yillik">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
