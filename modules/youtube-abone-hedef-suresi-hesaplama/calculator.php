<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_youtube_abone_hedef_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-youtube-abone-hedef-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/youtube-abone-hedef-suresi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-youtube-abone-hedef">
        <h3>YouTube Abone Hedef Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-yt-mevcut">Mevcut Abone Sayısı</label>
            <input type="number" id="hc-yt-mevcut" min="1" placeholder="örn: 1200" />
        </div>

        <div class="hc-form-group">
            <label for="hc-yt-hedef">Hedeflenen Abone Sayısı</label>
            <input type="number" id="hc-yt-hedef" min="1" placeholder="örn: 10000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-yt-artis">Son 30 Günde Kazanılan Abone Sayısı</label>
            <input type="number" id="hc-yt-artis" min="1" placeholder="örn: 450" />
        </div>

        <button class="hc-btn" onclick="hcYoutubeAboneHedefSuresiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-youtube-abone-hedef-result">
            <table>
                <tr>
                    <td>Hedefe Ulaşmak İçin Gereken Abone</td>
                    <td><strong id="hc-yt-res-kalan">-</strong></td>
                </tr>
                <tr>
                    <td>Günlük Ortalama Abone Artış Hızı</td>
                    <td><strong id="hc-yt-res-gunluk">-</strong></td>
                </tr>
                <tr>
                    <td>Hedefe Kalan Süre</td>
                    <td><strong class="hc-result-value" id="hc-yt-res-sure" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
                <tr>
                    <td>Aylık Artış Oranı</td>
                    <td><strong id="hc-yt-res-oran">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
