<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maas_hesaplama_2026( $atts ) {
    wp_enqueue_script(
        'hc-maas-hesaplama-2026',
        HC_PLUGIN_URL . 'modules/maas-hesaplama-2026/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-maas-hesaplama-2026-css',
        HC_PLUGIN_URL . 'modules/maas-hesaplama-2026/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-maas-hesaplama-2026">
        <h3>Maaş Hesaplama 2026</h3>

        <div class="hc-maas-hesaplama-2026-form">
            <div class="hc-maas-hesaplama-2026-grid-2">
                <div class="hc-form-group">
                    <label for="hc-maas-ucret-tipi">Ücret Tipi</label>
                    <select id="hc-maas-ucret-tipi">
                        <option value="brutten">Brütten Nete</option>
                        <option value="netten">Netten Brüte</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label for="hc-maas-yil">Yıl</label>
                    <select id="hc-maas-yil">
                        <option value="2026">2026</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label for="hc-maas-medeni">Medeni Durumu</label>
                    <select id="hc-maas-medeni">
                        <option value="bekar">Bekar</option>
                        <option value="evli">Evli</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label for="hc-maas-esi">Eşi Çalışıyor mu?</label>
                    <select id="hc-maas-esi">
                        <option value="evet">Çalışıyor</option>
                        <option value="hayir">Çalışmıyor</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label for="hc-maas-cocuk">Çocuk Sayısı</label>
                    <input type="number" id="hc-maas-cocuk" min="0" max="10" step="1" value="0" />
                </div>
            </div>

            <div class="hc-maas-hesaplama-2026-checks">
                <label><input type="checkbox" id="hc-maas-maliyet" checked /> İşveren maliyetini göster</label>
                <label><input type="checkbox" id="hc-maas-indirim5" checked /> Sigorta primi işveren payının hesabında 5 puanlık indirim dikkate alınsın.</label>
                <label><input type="checkbox" id="hc-maas-indirim2" /> Sigorta primi işveren payının hesabında 2 puanlık indirim dikkate alınsın.</label>
                <label><input type="checkbox" id="hc-maas-istisna" checked /> Asgari ücret GV / Damga istisnası uygula</label>
            </div>
        </div>

        <button class="hc-btn hc-maas-hesaplama-2026-primary" onclick="hcMaasTabloHesapla2026()">Hesapla</button>

        <div class="hc-maas-hesaplama-2026-detail">
            <h4 class="hc-maas-hesaplama-2026-title" id="hc-maas-baslik">Brütten Nete Maaş Hesabı</h4>
            <div class="hc-maas-hesaplama-2026-table-wrap">
                <table class="hc-maas-hesaplama-2026-table" id="hc-maas-table">
                    <thead>
                        <tr>
                            <th>Ay</th>
                            <th id="hc-maas-input-col">Brüt</th>
                            <th>SSK İşçi</th>
                            <th>İşsizlik İşçi</th>
                            <th>Aylık Gelir Vergisi</th>
                            <th>Damga Vergisi</th>
                            <th>Kümülatif Vergi Matrahı</th>
                            <th>Net</th>
                            <th>Asgari Geçim İndirimi</th>
                            <th>Asgari Ücret Gelir Vergisi İstisnası</th>
                            <th>Asgari Ücret Damga Vergisi İstisnası</th>
                            <th>Toplam Net Ele Geçen</th>
                            <th class="hc-maas-employer-col">SSK İşveren</th>
                            <th class="hc-maas-employer-col">İşsizlik İşveren</th>
                            <th class="hc-maas-employer-col">Toplam Maliyet</th>
                        </tr>
                    </thead>
                    <tbody id="hc-maas-tbody"></tbody>
                    <tfoot id="hc-maas-tfoot"></tfoot>
                </table>
            </div>

            <button class="hc-btn hc-maas-hesaplama-2026-primary hc-maas-hesaplama-2026-bottom" onclick="hcMaasTabloHesapla2026()">Hesapla</button>

            <ol class="hc-maas-hesaplama-2026-notes">
                <li>Yapılan maaş hesaplamalarında para birimi TL olarak esas alınmaktadır.</li>
                <li>Hesaplamalar bilgilendirme amaçlıdır; kesin bordro için uzman veya danışman bilgisine başvurulması tavsiye olunur.</li>
                <li>Rakam asgari ücretin altında olduğunda hesaplama yapılmaz.</li>
                <li>2026 yılında AGİ uygulanmadığı için Asgari Geçim İndirimi alanı 0,00 TL gösterilir.</li>
            </ol>
        </div>
    </div>
    <?php
}
