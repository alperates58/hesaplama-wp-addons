<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_protein_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-protein-ihtiyaci-hesaplama',
        HC_PLUGIN_URL . 'modules/protein-ihtiyaci-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-protein-ihtiyaci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/protein-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-protein-ihtiyaci-hesaplama" id="hc-protein-ihtiyaci-hesaplama">
        <h3>Protein İhtiyacı Hesaplama</h3>
        <p class="hc-protein-ihtiyaci-hesaplama-intro">Kilonuzu ve hedefinizi girerek günlük tahmini protein ihtiyacınızı hesaplayın.</p>

        <div class="hc-protein-ihtiyaci-hesaplama-grid">
            <div class="hc-form-group">
                <label for="hc-pih-kilo">Kilo</label>
                <input type="number" id="hc-pih-kilo" min="30" max="250" step="0.1" placeholder="kg" />
            </div>

            <div class="hc-form-group">
                <label for="hc-pih-hedef">Hedef / Aktivite</label>
                <select id="hc-pih-hedef">
                    <option value="temel">Temel ihtiyaç</option>
                    <option value="aktif">Düzenli egzersiz</option>
                    <option value="kas">Kas kazanımı / yoğun egzersiz</option>
                    <option value="kilo-kaybi">Kilo kaybında kas koruma</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-pih-ogun">Günlük Öğün Sayısı</label>
                <input type="number" id="hc-pih-ogun" min="2" max="6" step="1" placeholder="öğün" />
            </div>

            <div class="hc-form-group">
                <label for="hc-pih-durum">Özel Durum</label>
                <select id="hc-pih-durum">
                    <option value="yok">Yok</option>
                    <option value="bobrek">Böbrek hastalığı veya protein kısıtlaması var</option>
                    <option value="gebelik">Gebelik veya emzirme</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcProteinIhtiyaciHesapla()">Hesapla</button>

        <div class="hc-result hc-protein-ihtiyaci-hesaplama-result" id="hc-pih-result">
            <div class="hc-protein-ihtiyaci-hesaplama-hero">
                <span class="hc-protein-ihtiyaci-hesaplama-badge">g/gün</span>
                <div>
                    <div class="hc-result-value" id="hc-pih-ana-sonuc"></div>
                    <div class="hc-protein-ihtiyaci-hesaplama-subtitle" id="hc-pih-ozet"></div>
                </div>
            </div>

            <div class="hc-protein-ihtiyaci-hesaplama-cards">
                <div>
                    <span>Alt Hedef</span>
                    <strong id="hc-pih-alt"></strong>
                </div>
                <div>
                    <span>Üst Hedef</span>
                    <strong id="hc-pih-ust"></strong>
                </div>
                <div>
                    <span>Kg Başına</span>
                    <strong id="hc-pih-katsayi"></strong>
                </div>
                <div>
                    <span>Öğün Başına</span>
                    <strong id="hc-pih-ogun-sonuc"></strong>
                </div>
            </div>

            <p class="hc-protein-ihtiyaci-hesaplama-yorum" id="hc-pih-yorum"></p>
            <p class="hc-protein-ihtiyaci-hesaplama-not">Bu hesaplama genel bilgilendirme amaçlıdır. Böbrek hastalığı, karaciğer hastalığı, gebelik, emzirme, kronik hastalık veya tıbbi diyet varsa kişisel hedef için doktor ya da diyetisyene danışın.</p>
        </div>
    </div>
    <?php
}
