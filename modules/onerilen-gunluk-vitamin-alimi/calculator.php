<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_onerilen_gunluk_vitamin_alimi( $atts ) {
    wp_enqueue_script(
        'hc-onerilen-gunluk-vitamin-alimi',
        HC_PLUGIN_URL . 'modules/onerilen-gunluk-vitamin-alimi/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-onerilen-gunluk-vitamin-alimi-css',
        HC_PLUGIN_URL . 'modules/onerilen-gunluk-vitamin-alimi/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-vitamin-alimi" id="hc-onerilen-gunluk-vitamin-alimi">
        <h3>Önerilen Günlük Vitamin Alımı</h3>

        <div class="hc-vitamin-alimi-grid">
            <div class="hc-form-group">
                <label for="hc-vta-yas">Yaş</label>
                <input type="number" id="hc-vta-yas" min="0" max="120" step="1" placeholder="Örn. 35" />
            </div>

            <div class="hc-form-group">
                <label for="hc-vta-yas-birim">Yaş Birimi</label>
                <select id="hc-vta-yas-birim">
                    <option value="yil" selected>Yıl</option>
                    <option value="ay">Ay</option>
                </select>
            </div>

            <div class="hc-form-group" id="hc-vta-cinsiyet-grup">
                <label for="hc-vta-cinsiyet">Cinsiyet</label>
                <select id="hc-vta-cinsiyet">
                    <option value="kadin">Kadın</option>
                    <option value="erkek">Erkek</option>
                </select>
            </div>

            <div class="hc-form-group" id="hc-vta-durum-grup">
                <label for="hc-vta-durum">Özel Durum</label>
                <select id="hc-vta-durum">
                    <option value="normal" selected>Yok</option>
                    <option value="gebelik">Gebelik</option>
                    <option value="emzirme">Emzirme</option>
                </select>
            </div>
        </div>

        <label class="hc-vitamin-alimi-check">
            <input type="checkbox" id="hc-vta-sigara" />
            <span>Sigara kullanıyorum</span>
        </label>

        <button class="hc-btn" onclick="hcOnerilenGunlukVitaminAlimiHesapla()">Hesapla</button>

        <div class="hc-result hc-vitamin-alimi-result" id="hc-vta-result">
            <div class="hc-vitamin-alimi-summary">
                <div>
                    <div class="hc-result-value" id="hc-vta-baslik"></div>
                    <div class="hc-vitamin-alimi-subtitle" id="hc-vta-ozet"></div>
                </div>
            </div>

            <div class="hc-vitamin-alimi-table-wrap">
                <table class="hc-vitamin-alimi-table">
                    <thead>
                        <tr>
                            <th>Vitamin</th>
                            <th>Önerilen Günlük Alım</th>
                        </tr>
                    </thead>
                    <tbody id="hc-vta-tablo"></tbody>
                </table>
            </div>

            <p class="hc-vitamin-alimi-not" id="hc-vta-not"></p>
            <p class="hc-vitamin-alimi-uyari">Bu değerler genel beslenme referansıdır; hastalık, ilaç kullanımı veya takviye ihtiyacı için sağlık uzmanına danışın.</p>
        </div>
    </div>
    <?php
}
