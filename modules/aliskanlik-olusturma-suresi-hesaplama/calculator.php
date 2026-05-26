<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aliskanlik_olusturma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-habit-time',
        HC_PLUGIN_URL . 'modules/aliskanlik-olusturma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-habit-time-css',
        HC_PLUGIN_URL . 'modules/aliskanlik-olusturma-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aliskanlik-olusturma-suresi-hesaplama">
        <h3>Alışkanlık Oluşturma Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-aoh-zorluk">Kazanılacak Alışkanlığın Zorluğu</label>
            <select id="hc-aoh-zorluk">
                <option value="-20">Kolay (Örn: Her sabah 1 bardak su içmek)</option>
                <option value="0" selected>Orta Derece (Örn: Günlük 30 dk yürüyüş, kitap okuma)</option>
                <option value="30">Zor (Örn: Her gün spor salonuna gitmek, sigarayı bırakmak)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-aoh-motivasyon">Başlangıç Motivasyon Seviyeniz (1 - 10)</label>
            <input type="number" id="hc-aoh-motivasyon" value="8" min="1" max="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-aoh-destek">Çevresel Destek / Tetikleyici Gücü (1 - 10)</label>
            <input type="number" id="hc-aoh-destek" value="7" min="1" max="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-aoh-tekrar">Tekrarlama Sıklığı</label>
            <select id="hc-aoh-tekrar">
                <option value="0">Her gün (Hızlı alışma)</option>
                <option value="15">Haftada 3-4 gün</option>
                <option value="30">Haftada 1 gün (Zaman Alır)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAliskanlikHesapla()">Süreyi Tahmin Et</button>
        
        <div class="hc-result" id="hc-aoh-result">
            <h4>Alışkanlık Yolculuk Haritası:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Gerekli Tahmini Süre</td>
                        <td id="hc-aoh-res-gun">66 Gün</td>
                    </tr>
                    <tr>
                        <td>Başarı Olasılığı Yüzdesi</td>
                        <td id="hc-aoh-res-sans">%0</td>
                    </tr>
                    <tr>
                        <td>Süreç Tavsiyesi</td>
                        <td id="hc-aoh-res-tavsiye">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}