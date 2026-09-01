<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_solar_arc_haritasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-arc',
        HC_PLUGIN_URL . 'modules/solar-arc-haritasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-arc-css',
        HC_PLUGIN_URL . 'modules/solar-arc-haritasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-arc">
        <div class="hc-header">
            <h3>Solar Arc (Güneş Yayı Yönelim Haritası) Hesaplama</h3>
            <p class="hc-subtitle">Güneşinizin ikincil ilerletimdeki yay mesafesiyle tüm gezegenlerinizi yönelterek hayatınızdaki dönüm noktalarını, evlilik, kariyer sıçraması ve majör kriz zamanlarını analiz edin.</p>
        </div>

        <div class="hc-form-grid-2">
            <div class="hc-form-group">
                <label for="hc-sa-birth">Doğum Tarihiniz *</label>
                <input type="date" id="hc-sa-birth" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-sa-year">Hedef Yıl (Yaşınız) *</label>
                <input type="number" id="hc-sa-year" class="hc-input" value="2026" min="1900" max="2100" required>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcSolarArcHesapla()">📐 Güneş Yayını ve Dönüm Noktalarını Hesapla</button>

        <div class="hc-result" id="hc-solar-arc-result">
            <div class="hc-sa-hero" id="hc-sa-hero"></div>

            <div class="hc-sa-section">
                <h4 class="hc-sa-sec-title">🎯 Aktif Solar Arc Dönüm Noktası Açıları (±1° Orb)</h4>
                <div id="hc-sa-aspects-list"></div>
            </div>

            <div class="hc-sa-section">
                <h4 class="hc-sa-sec-title">🪐 Yöneltilmiş (Directed) Gezegen Tablosu</h4>
                <div id="hc-sa-table-container"></div>
            </div>
        </div>
    </div>
    <?php
}
