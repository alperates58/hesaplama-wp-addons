<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bina_isi_kaybi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-heat-loss',
        HC_PLUGIN_URL . 'modules/bina-isi-kaybi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-heat-loss-css',
        HC_PLUGIN_URL . 'modules/bina-isi-kaybi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-heat-loss">
        <h3>Bina Isı Kaybı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hl-area">Yüzey Alanı (m²)</label>
            <input type="number" id="hc-hl-area" placeholder="Örn: 100" step="1">
            <small>Dış cephe, çatı ve zemin toplam alanı.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-hl-u">Isı Geçirgenlik Katsayısı (U - W/m²K)</label>
            <input type="number" id="hc-hl-u" placeholder="Örn: 0.5 (İyi yalıtımlı), 2.0 (Yalıtımsız)" step="0.01">
        </div>

        <div class="hc-form-group">
            <label for="hc-hl-tint">İç Ortam Sıcaklığı (°C)</label>
            <input type="number" id="hc-hl-tint" value="22" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-hl-text">Dış Ortam Sıcaklığı (°C)</label>
            <input type="number" id="hc-hl-text" value="0" step="1">
        </div>

        <button class="hc-btn" onclick="hcIsiKaybiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-hl-result">
            <div class="hc-result-item">
                <span>Anlık Isı Kaybı:</span>
                <span class="hc-result-value" id="hc-res-hl-watt">-</span>
            </div>
            <div class="hc-result-item">
                <span>Kcal/Saat Cinsinden:</span>
                <span class="hc-result-value" id="hc-res-hl-kcal">-</span>
            </div>
            <div class="hc-result-note">
                * Bu hesaplama basit iletim kaybıdır. Havalandırma ve sızıntı kayıpları dahil değildir.
            </div>
        </div>
    </div>
    <?php
}
