<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_evresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-evresi-hesaplama',
        HC_PLUGIN_URL . 'modules/ay-evresi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-ay-evresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ay-evresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-ay-evresi" id="hc-ay-evresi-hesaplama">
        <h3>Ay Evresi Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-aeh-tarih">Tarih</label>
            <input type="date" id="hc-aeh-tarih" />
            <small class="hc-ay-evresi-not">Sonuç seçilen günün UTC 00:00 anına göre yaklaşık olarak hesaplanır.</small>
        </div>

        <button class="hc-btn" onclick="hcAyEvresiHesapla()">Hesapla</button>

        <div class="hc-result hc-ay-evresi-result" id="hc-aeh-result">
            <div class="hc-ay-evresi-hero">
                <div class="hc-ay-evresi-badge" id="hc-aeh-badge">AY</div>
                <div>
                    <div class="hc-result-value" id="hc-aeh-faz"></div>
                    <div class="hc-ay-evresi-subtitle" id="hc-aeh-yorum"></div>
                </div>
            </div>

            <div class="hc-ay-evresi-grid">
                <div>
                    <span>Ay yaşı</span>
                    <strong id="hc-aeh-yas"></strong>
                </div>
                <div>
                    <span>Aydınlanma oranı</span>
                    <strong id="hc-aeh-aydinlanma"></strong>
                </div>
                <div>
                    <span>Döngü konumu</span>
                    <strong id="hc-aeh-dongu"></strong>
                </div>
            </div>

            <p class="hc-ay-evresi-note" id="hc-aeh-bilgi"></p>
            <p class="hc-ay-evresi-warning" id="hc-aeh-uyari"></p>
        </div>
    </div>
    <?php
}
