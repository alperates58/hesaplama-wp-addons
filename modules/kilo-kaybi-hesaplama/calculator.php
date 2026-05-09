<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilo_kaybi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kilo-kaybi-hesaplama',
        HC_PLUGIN_URL . 'modules/kilo-kaybi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-kilo-kaybi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kilo-kaybi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-kilo-kaybi" id="hc-kilo-kaybi-hesaplama">
        <h3>Kilo Kaybı Hesaplama</h3>

        <div class="hc-kilo-kaybi-grid">
            <div class="hc-form-group">
                <label for="hc-kkh-mevcut">Mevcut Kilo</label>
                <input type="number" id="hc-kkh-mevcut" min="30" max="300" step="0.1" placeholder="kg" />
            </div>

            <div class="hc-form-group">
                <label for="hc-kkh-hedef">Hedef Kilo</label>
                <input type="number" id="hc-kkh-hedef" min="30" max="300" step="0.1" placeholder="kg" />
            </div>

            <div class="hc-form-group">
                <label for="hc-kkh-koruma">Günlük Koruma Kalorisi</label>
                <input type="number" id="hc-kkh-koruma" min="1000" max="6000" step="1" placeholder="kcal/gün" />
            </div>

            <div class="hc-form-group">
                <label for="hc-kkh-alim">Planlanan Günlük Kalori Alımı</label>
                <input type="number" id="hc-kkh-alim" min="800" max="6000" step="1" placeholder="kcal/gün" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcKiloKaybiHesapla()">Hesapla</button>

        <div class="hc-result hc-kilo-kaybi-result" id="hc-kkh-result">
            <div class="hc-kilo-kaybi-hero">
                <div class="hc-kilo-kaybi-badge" id="hc-kkh-badge"></div>
                <div>
                    <div class="hc-result-value" id="hc-kkh-sure"></div>
                    <div class="hc-kilo-kaybi-subtitle" id="hc-kkh-ozet"></div>
                </div>
            </div>

            <div class="hc-kilo-kaybi-details">
                <div><span>Günlük kalori açığı</span><strong id="hc-kkh-acik"></strong></div>
                <div><span>Haftalık tahmini kayıp</span><strong id="hc-kkh-haftalik"></strong></div>
                <div><span>Toplam hedef kayıp</span><strong id="hc-kkh-toplam"></strong></div>
            </div>

            <div class="hc-kilo-kaybi-details hc-kilo-kaybi-secondary">
                <div><span>Gerekli toplam açık</span><strong id="hc-kkh-toplam-acik"></strong></div>
                <div><span>Tahmini hedef tarihi</span><strong id="hc-kkh-tarih"></strong></div>
                <div><span>Plan değerlendirmesi</span><strong id="hc-kkh-seviye"></strong></div>
            </div>

            <p class="hc-kilo-kaybi-yorum" id="hc-kkh-yorum"></p>
            <p class="hc-kilo-kaybi-uyari" id="hc-kkh-uyari"></p>
        </div>
    </div>
    <?php
}
