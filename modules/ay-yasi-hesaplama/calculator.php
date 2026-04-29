<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-yasi-hesaplama',
        HC_PLUGIN_URL . 'modules/ay-yasi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-ay-yasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ay-yasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-ay-yasi" id="hc-ay-yasi-hesaplama">
        <h3>Ay Yaşı Hesaplama</h3>

        <div class="hc-ay-yasi-grid">
            <div class="hc-form-group">
                <label for="hc-ayy-dogum">Doğum Tarihi</label>
                <input type="date" id="hc-ayy-dogum" min="1900-01-01" max="2100-12-31" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ayy-tarih">Hesaplama Tarihi</label>
                <input type="date" id="hc-ayy-tarih" min="1900-01-01" max="2100-12-31" />
            </div>
        </div>

        <p class="hc-ay-yasi-not">Çin takviminde kişi doğduğunda 1 yaşında kabul edilir ve yaş Çin Yeni Yılı geldiğinde artar.</p>

        <button class="hc-btn" onclick="hcAyYasiHesapla()">Hesapla</button>

        <div class="hc-result hc-ay-yasi-result" id="hc-ayy-result">
            <div class="hc-ay-yasi-card">
                <div class="hc-ay-yasi-badge" id="hc-ayy-badge">AY</div>
                <div>
                    <div class="hc-result-value" id="hc-ayy-ay-yasi"></div>
                    <div class="hc-ay-yasi-subtitle" id="hc-ayy-ozet"></div>
                </div>
            </div>

            <div class="hc-ay-yasi-details">
                <div>
                    <span>Miladi yaş</span>
                    <strong id="hc-ayy-miladi"></strong>
                </div>
                <div>
                    <span>Çin takvim yılı</span>
                    <strong id="hc-ayy-cin-yili"></strong>
                </div>
                <div>
                    <span>Çin Yeni Yılı</span>
                    <strong id="hc-ayy-yeni-yil"></strong>
                </div>
            </div>

            <p class="hc-ay-yasi-yorum" id="hc-ayy-yorum"></p>
            <p class="hc-ay-yasi-uyari" id="hc-ayy-uyari"></p>
        </div>
    </div>
    <?php
}
