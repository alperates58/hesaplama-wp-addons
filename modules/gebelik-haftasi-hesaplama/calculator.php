<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelik_haftasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gebelik-haftasi-hesaplama',
        HC_PLUGIN_URL . 'modules/gebelik-haftasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gebelik-haftasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gebelik-haftasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-gebelik-haftasi" id="hc-gebelik-haftasi-hesaplama">
        <div class="hc-header">
            <h3>Hafta Hafta Gebelik Takibi & Kaç Haftalık Hamileyim?</h3>
            <p class="hc-subtitle">Son adet tarihinizi (SAT) girerek tam gebelik haftanızı, bebeğinizin meyve boyutunu, gelişim aşamalarını ve kritik test takviminizi öğrenin.</p>
        </div>

        <div class="hc-gebelik-haftasi-grid">
            <div class="hc-form-group">
                <label for="hc-gebelik-haftasi-sat">Son Adet Tarihinizin İlk Günü (SAT) *</label>
                <input type="date" id="hc-gebelik-haftasi-sat" class="hc-input" required />
            </div>
            <div class="hc-form-group">
                <label for="hc-gebelik-haftasi-bugun">Hesaplama Tarihi</label>
                <input type="date" id="hc-gebelik-haftasi-bugun" class="hc-input" />
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcGebelikHaftasiHesapla()">🤰 Bebeğimin Gelişimini & Haftasını Hesapla</button>

        <div class="hc-result hc-gebelik-haftasi-result" id="hc-gebelik-haftasi-result">
            <div class="hc-gebelik-haftasi-hero">
                <span class="hc-gebelik-haftasi-badge" id="hc-gebelik-haftasi-badge"></span>
                <div>
                    <div class="hc-result-value" id="hc-gebelik-haftasi-ana-sonuc"></div>
                    <div class="hc-gebelik-haftasi-subtitle" id="hc-gebelik-haftasi-ozet"></div>
                </div>
            </div>

            <div class="hc-baby-fruit-box" id="hc-baby-fruit-box"></div>

            <div class="hc-gebelik-haftasi-cards">
                <div>
                    <span>Tahmini Doğum Tarihi</span>
                    <strong id="hc-gebelik-haftasi-dogum"></strong>
                </div>
                <div>
                    <span>Doğuma Kalan Süre</span>
                    <strong id="hc-gebelik-haftasi-kalan"></strong>
                </div>
                <div>
                    <span>Geçen Gün Sayısı</span>
                    <strong id="hc-gebelik-haftasi-gecen"></strong>
                </div>
                <div>
                    <span>Mevcut Trimester</span>
                    <strong id="hc-gebelik-haftasi-donem"></strong>
                </div>
            </div>

            <div class="hc-gebelik-haftasi-progress">
                <div class="hc-gebelik-haftasi-progress-head">
                    <span>40 Haftalık Gebelik Yolculuğundaki İlerlemeniz</span>
                    <strong id="hc-gebelik-haftasi-yuzde"></strong>
                </div>
                <div class="hc-gebelik-haftasi-bar">
                    <span id="hc-gebelik-haftasi-bar-fill"></span>
                </div>
            </div>

            <div class="hc-screenings-box">
                <h4>📅 Bu Dönemdeki Kritik Tıbbi Testler & Taramalar</h4>
                <div id="hc-gebelik-screenings"></div>
            </div>

            <p class="hc-gebelik-haftasi-yorum" id="hc-gebelik-haftasi-yorum"></p>
            <p class="hc-gebelik-haftasi-not">Bu hesaplama Naegele kuralına dayanmaktadır ve bilgilendirme amaçlıdır. Kesin ultrason ölçümleri ve tıbbi değerlendirme için hekiminize danışınız.</p>
        </div>
    </div>
    <?php
}
