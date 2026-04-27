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
        <h3>💼 Maaş Hesaplama 2026</h3>

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
        </div>

        <div class="hc-maas-hesaplama-2026-grid-2">
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
        </div>

        <div class="hc-maas-hesaplama-2026-grid-2">
            <div class="hc-form-group">
                <label for="hc-maas-cocuk">Çocuk Sayısı</label>
                <input type="number" id="hc-maas-cocuk" min="0" max="10" step="1" value="0" />
            </div>
            <div class="hc-form-group hc-maas-hesaplama-2026-checks">
                <label><input type="checkbox" id="hc-maas-maliyet" checked /> İşveren maliyetini göster</label>
                <label><input type="checkbox" id="hc-maas-indirim5" checked /> İşveren SGK payında 5 puan indirim uygula</label>
                <label><input type="checkbox" id="hc-maas-indirim2" /> İşveren SGK payında 2 puan indirim uygula</label>
                <label><input type="checkbox" id="hc-maas-istisna" checked /> Asgari ücret GV / Damga istisnası uygula</label>
            </div>
        </div>

        <button class="hc-btn" onclick="hcMaasTabloHesapla2026()">Hesapla</button>

        <div class="hc-result" id="hc-maas-result">
            <h4 class="hc-maas-hesaplama-2026-title" id="hc-maas-baslik"></h4>
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
                            <th>Asgari Ücret GV İstisnası</th>
                            <th>Asgari Ücret Damga İstisnası</th>
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
            <p class="hc-maas-hesaplama-2026-note">
                Not: 2026 hesaplamasında AGİ uygulanmadığı için “Asgari Geçim İndirimi” satırı 0,00 TL gösterilir. Hesaplama tahminidir.
            </p>
        </div>
    </div>
    <?php
}
