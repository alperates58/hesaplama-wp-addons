<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelik_haftasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gebelik-haftasi-hesaplama',
        HC_PLUGIN_URL . 'modules/gebelik-haftasi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-gebelik-haftasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gebelik-haftasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-gebelik-haftasi" id="hc-gebelik-haftasi-hesaplama">
        <h3>Gebelik Haftası Hesaplama</h3>
        <p class="hc-gebelik-haftasi-intro">Son adet tarihinizin ilk gününü girerek gebelik haftanızı, tahmini doğum tarihinizi ve doğuma kalan süreyi hesaplayın.</p>

        <div class="hc-gebelik-haftasi-grid">
            <div class="hc-form-group">
                <label for="hc-gebelik-haftasi-sat">Son Adet Tarihinin İlk Günü</label>
                <input type="date" id="hc-gebelik-haftasi-sat" />
            </div>
            <div class="hc-form-group">
                <label for="hc-gebelik-haftasi-bugun">Hesaplama Tarihi</label>
                <input type="date" id="hc-gebelik-haftasi-bugun" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcGebelikHaftasiHesapla()">Hesapla</button>

        <div class="hc-result hc-gebelik-haftasi-result" id="hc-gebelik-haftasi-result">
            <div class="hc-gebelik-haftasi-hero">
                <span class="hc-gebelik-haftasi-badge" id="hc-gebelik-haftasi-badge"></span>
                <div>
                    <div class="hc-result-value" id="hc-gebelik-haftasi-ana-sonuc"></div>
                    <div class="hc-gebelik-haftasi-subtitle" id="hc-gebelik-haftasi-ozet"></div>
                </div>
            </div>

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
                    <span>Geçen Gün</span>
                    <strong id="hc-gebelik-haftasi-gecen"></strong>
                </div>
                <div>
                    <span>Tahmini Dönem</span>
                    <strong id="hc-gebelik-haftasi-donem"></strong>
                </div>
            </div>

            <div class="hc-gebelik-haftasi-progress">
                <div class="hc-gebelik-haftasi-progress-head">
                    <span>40 haftalık sürece göre ilerleme</span>
                    <strong id="hc-gebelik-haftasi-yuzde"></strong>
                </div>
                <div class="hc-gebelik-haftasi-bar">
                    <span id="hc-gebelik-haftasi-bar"></span>
                </div>
            </div>

            <p class="hc-gebelik-haftasi-yorum" id="hc-gebelik-haftasi-yorum"></p>
            <p class="hc-gebelik-haftasi-not">Bu hesaplama tıbbi tanı yerine geçmez. Gebelik takibi ve kesin tarih değerlendirmesi için doktorunuza danışın.</p>
        </div>
    </div>
    <?php
}
