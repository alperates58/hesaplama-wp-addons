<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_geri_sayim( $atts ) {
    wp_enqueue_script(
        'hc-geri-sayim',
        HC_PLUGIN_URL . 'modules/geri-sayim/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-geri-sayim-css',
        HC_PLUGIN_URL . 'modules/geri-sayim/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-geri-sayim">
        <h3>Geri Sayım Hesaplama</h3>

        <div class="hc-geri-sayim-grid">
            <div class="hc-form-group">
                <label for="hc-geri-sayim-etkinlik">Önemli gün veya sınav</label>
                <select id="hc-geri-sayim-etkinlik" onchange="hcGeriSayimEtkinlikDegisti()">
                    <option value="">Seçiniz</option>
                    <optgroup label="Türkiye önemli günleri">
                        <option value="yilbasi">Yılbaşı</option>
                        <option value="ramazan-bayrami-2026">Ramazan Bayramı 2026</option>
                        <option value="ulusal-egemenlik">23 Nisan Ulusal Egemenlik ve Çocuk Bayramı</option>
                        <option value="emek-dayanisma">1 Mayıs Emek ve Dayanışma Günü</option>
                        <option value="genclik-spor">19 Mayıs Atatürk'ü Anma, Gençlik ve Spor Bayramı</option>
                        <option value="kurban-bayrami-2026">Kurban Bayramı 2026</option>
                        <option value="demokrasi-birlik">15 Temmuz Demokrasi ve Milli Birlik Günü</option>
                        <option value="zafer-bayrami">30 Ağustos Zafer Bayramı</option>
                        <option value="cumhuriyet-bayrami">29 Ekim Cumhuriyet Bayramı</option>
                        <option value="on-kasim">10 Kasım Atatürk'ü Anma Günü</option>
                        <option value="ogretmenler-gunu">24 Kasım Öğretmenler Günü</option>
                    </optgroup>
                    <optgroup label="2026 ÖSYM sınavları">
                        <option value="msu-2026">2026-MSÜ</option>
                        <option value="ales-1-2026">2026-ALES/1</option>
                        <option value="yks-tyt-2026">2026-YKS TYT</option>
                        <option value="yks-ayt-2026">2026-YKS AYT</option>
                        <option value="yks-ydt-2026">2026-YKS YDT</option>
                        <option value="dgs-2026">2026-DGS</option>
                        <option value="ales-2-2026">2026-ALES/2</option>
                        <option value="kpss-lisans-2026">2026-KPSS Lisans GY-GK</option>
                        <option value="kpss-alan-1-2026">2026-KPSS Lisans Alan Bilgisi 1. gün</option>
                        <option value="kpss-alan-2-2026">2026-KPSS Lisans Alan Bilgisi 2. gün</option>
                        <option value="kpss-onlisans-2026">2026-KPSS Ön Lisans</option>
                        <option value="kpss-ortaogretim-2026">2026-KPSS Ortaöğretim</option>
                        <option value="ales-3-2026">2026-ALES/3</option>
                    </optgroup>
                    <option value="ozel">Özel tarih gir</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-geri-sayim-yil">Yıl</label>
                <input type="number" id="hc-geri-sayim-yil" min="2026" max="2100" step="1" placeholder="2026" />
            </div>
        </div>

        <div class="hc-geri-sayim-grid hc-geri-sayim-ozel" id="hc-geri-sayim-ozel-alan">
            <div class="hc-form-group">
                <label for="hc-geri-sayim-ozel-ad">Özel tarih adı</label>
                <input type="text" id="hc-geri-sayim-ozel-ad" placeholder="Örn: Proje teslimi" />
            </div>
            <div class="hc-form-group">
                <label for="hc-geri-sayim-ozel-tarih">Özel tarih</label>
                <input type="date" id="hc-geri-sayim-ozel-tarih" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcGeriSayimHesapla()">Geri Sayımı Hesapla</button>

        <div class="hc-result" id="hc-geri-sayim-result">
            <p class="hc-geri-sayim-kategori" id="hc-geri-sayim-kategori"></p>
            <div class="hc-result-value" id="hc-geri-sayim-baslik"></div>
            <div class="hc-geri-sayim-tarih" id="hc-geri-sayim-tarih"></div>
            <div class="hc-geri-sayim-sayac">
                <div><strong id="hc-geri-sayim-gun"></strong><span>Gün</span></div>
                <div><strong id="hc-geri-sayim-saat"></strong><span>Saat</span></div>
                <div><strong id="hc-geri-sayim-dakika"></strong><span>Dakika</span></div>
            </div>
            <p class="hc-geri-sayim-yorum" id="hc-geri-sayim-yorum"></p>
            <p class="hc-geri-sayim-not" id="hc-geri-sayim-not"></p>
        </div>
    </div>
    <?php
}
