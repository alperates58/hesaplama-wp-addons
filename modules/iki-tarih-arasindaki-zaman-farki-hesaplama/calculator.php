<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iki_tarih_arasindaki_zaman_farki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iki-tarih-arasindaki-zaman-farki-hesaplama',
        HC_PLUGIN_URL . 'modules/iki-tarih-arasindaki-zaman-farki-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-iki-tarih-arasindaki-zaman-farki-hesaplama-css',
        HC_PLUGIN_URL . 'modules/iki-tarih-arasindaki-zaman-farki-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-tarih-farki" id="hc-iki-tarih-arasindaki-zaman-farki-hesaplama">
        <h3>İki Tarih Arasındaki Zaman Farkı Hesaplama</h3>
        <p class="hc-tarih-farki-intro">İki tarih ve saat arasındaki farkı takvim olarak ve toplam süre olarak detaylı görün.</p>

        <div class="hc-tarih-farki-grid">
            <div class="hc-form-group">
                <label for="hc-itf-baslangic">Başlangıç Tarihi</label>
                <input type="date" id="hc-itf-baslangic" />
            </div>
            <div class="hc-form-group">
                <label for="hc-itf-baslangic-saat">Başlangıç Saati</label>
                <input type="time" id="hc-itf-baslangic-saat" value="00:00" />
            </div>
            <div class="hc-form-group">
                <label for="hc-itf-bitis">Bitiş Tarihi</label>
                <input type="date" id="hc-itf-bitis" />
            </div>
            <div class="hc-form-group">
                <label for="hc-itf-bitis-saat">Bitiş Saati</label>
                <input type="time" id="hc-itf-bitis-saat" value="00:00" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcIkiTarihArasindakiZamanFarkiHesapla()">Hesapla</button>

        <div class="hc-result hc-tarih-farki-result" id="hc-itf-result">
            <div class="hc-tarih-farki-hero">
                <div class="hc-tarih-farki-badge" id="hc-itf-badge"></div>
                <div>
                    <div class="hc-result-value" id="hc-itf-ana-sonuc"></div>
                    <div class="hc-tarih-farki-subtitle" id="hc-itf-ozet"></div>
                </div>
            </div>

            <div class="hc-tarih-farki-details">
                <div><span>Takvim yılı</span><strong id="hc-itf-yil"></strong></div>
                <div><span>Takvim ayı</span><strong id="hc-itf-ay"></strong></div>
                <div><span>Takvim günü</span><strong id="hc-itf-gun"></strong></div>
                <div><span>Toplam hafta</span><strong id="hc-itf-hafta"></strong></div>
                <div><span>Toplam gün</span><strong id="hc-itf-toplam-gun"></strong></div>
                <div><span>Toplam saat</span><strong id="hc-itf-saat"></strong></div>
                <div><span>Toplam dakika</span><strong id="hc-itf-dakika"></strong></div>
                <div><span>Toplam saniye</span><strong id="hc-itf-saniye"></strong></div>
            </div>

            <div class="hc-tarih-farki-extra">
                <div><span>Başlangıç günü</span><strong id="hc-itf-baslangic-gun"></strong></div>
                <div><span>Bitiş günü</span><strong id="hc-itf-bitis-gun"></strong></div>
                <div><span>Yön</span><strong id="hc-itf-yon"></strong></div>
            </div>

            <p class="hc-tarih-farki-yorum" id="hc-itf-yorum"></p>
        </div>
    </div>
    <?php
}
