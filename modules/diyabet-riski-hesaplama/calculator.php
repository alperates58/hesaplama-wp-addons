<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_diyabet_riski_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-diyabet-riski-hesaplama',
        HC_PLUGIN_URL . 'modules/diyabet-riski-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-diyabet-riski-hesaplama-css',
        HC_PLUGIN_URL . 'modules/diyabet-riski-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-diyabet-riski" id="hc-diyabet-riski-hesaplama">
        <h3>Diyabet Riski Hesaplama</h3>

        <div class="hc-diyabet-riski-grid">
            <div class="hc-form-group">
                <label for="hc-drh-yas">Yaş</label>
                <input type="number" id="hc-drh-yas" min="18" max="120" step="1" placeholder="Örn. 45" />
            </div>

            <div class="hc-form-group">
                <label for="hc-drh-cinsiyet">Cinsiyet</label>
                <select id="hc-drh-cinsiyet">
                    <option value="kadin">Kadın</option>
                    <option value="erkek">Erkek</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-drh-boy">Boy</label>
                <input type="number" id="hc-drh-boy" min="100" max="230" step="0.1" placeholder="cm" />
            </div>

            <div class="hc-form-group">
                <label for="hc-drh-kilo">Kilo</label>
                <input type="number" id="hc-drh-kilo" min="30" max="300" step="0.1" placeholder="kg" />
            </div>

            <div class="hc-form-group">
                <label for="hc-drh-bel">Bel Çevresi</label>
                <input type="number" id="hc-drh-bel" min="40" max="200" step="0.1" placeholder="cm" />
            </div>

            <div class="hc-form-group">
                <label for="hc-drh-aktivite">Günlük en az 30 dk fiziksel aktivite</label>
                <select id="hc-drh-aktivite">
                    <option value="evet">Evet</option>
                    <option value="hayir">Hayır</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-drh-beslenme">Her gün sebze, meyve veya lifli gıda</label>
                <select id="hc-drh-beslenme">
                    <option value="evet">Evet</option>
                    <option value="hayir">Hayır</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-drh-tansiyon">Düzenli tansiyon ilacı kullanımı</label>
                <select id="hc-drh-tansiyon">
                    <option value="hayir">Hayır</option>
                    <option value="evet">Evet</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-drh-glukoz">Daha önce yüksek kan şekeri saptandı mı?</label>
                <select id="hc-drh-glukoz">
                    <option value="hayir">Hayır</option>
                    <option value="evet">Evet</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-drh-aile">Ailede diyabet öyküsü</label>
                <select id="hc-drh-aile">
                    <option value="yok">Yok</option>
                    <option value="ikinci">Dede, nine, amca, dayı, hala, teyze veya kuzen</option>
                    <option value="birinci">Anne, baba, kardeş veya çocuk</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcDiyabetRiskiHesapla()">Hesapla</button>

        <div class="hc-result hc-diyabet-riski-result" id="hc-drh-result">
            <div class="hc-diyabet-riski-hero">
                <div class="hc-diyabet-riski-score" id="hc-drh-puan"></div>
                <div>
                    <div class="hc-result-value" id="hc-drh-risk"></div>
                    <div class="hc-diyabet-riski-subtitle" id="hc-drh-olasilik"></div>
                </div>
            </div>

            <div class="hc-diyabet-riski-details">
                <div><span>BKİ</span><strong id="hc-drh-bki"></strong></div>
                <div><span>Bel çevresi puanı</span><strong id="hc-drh-bel-puan"></strong></div>
                <div><span>Toplam FINDRISC</span><strong id="hc-drh-toplam"></strong></div>
            </div>

            <ul class="hc-diyabet-riski-breakdown" id="hc-drh-detay"></ul>
            <p class="hc-diyabet-riski-yorum" id="hc-drh-yorum"></p>
            <p class="hc-diyabet-riski-uyari">Bu araç tanı koymaz. Yüksek risk, belirti, gebelik öyküsü veya kan şekeri şüphesi varsa hekime başvurun.</p>
        </div>
    </div>
    <?php
}
