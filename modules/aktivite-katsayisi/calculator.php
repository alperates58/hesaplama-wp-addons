<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aktivite_katsayisi( $atts ) {
    wp_enqueue_script(
        'hc-aktivite-katsayisi',
        HC_PLUGIN_URL . 'modules/aktivite-katsayisi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aktivite-katsayisi-css',
        HC_PLUGIN_URL . 'modules/aktivite-katsayisi/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aktivite-katsayisi">
        <div class="hc-header">
            <h3>Aktivite Katsayısı Hesaplayıcı</h3>
            <p>Günlük hareket seviyenizi seçin ve enerji ihtiyacınızı öğrenin.</p>
        </div>
        
        <div class="hc-form-group">
            <label>Aktivite Seviyeniz</label>
            <div class="hc-activity-options">
                <label class="hc-activity-card">
                    <input type="radio" name="hc-pal" value="1.2" checked>
                    <div class="hc-card-content">
                        <strong>Hareketsiz (Sedentary)</strong>
                        <span>Masa başı iş, az veya hiç egzersiz.</span>
                    </div>
                </label>
                <label class="hc-activity-card">
                    <input type="radio" name="hc-pal" value="1.375">
                    <div class="hc-card-content">
                        <strong>Hafif Aktif</strong>
                        <span>Haftada 1-3 gün hafif spor/egzersiz.</span>
                    </div>
                </label>
                <label class="hc-activity-card">
                    <input type="radio" name="hc-pal" value="1.55">
                    <div class="hc-card-content">
                        <strong>Orta Aktif</strong>
                        <span>Haftada 3-5 gün orta tempolu spor.</span>
                    </div>
                </label>
                <label class="hc-activity-card">
                    <input type="radio" name="hc-pal" value="1.725">
                    <div class="hc-card-content">
                        <strong>Çok Aktif</strong>
                        <span>Haftada 6-7 gün ağır spor/antrenman.</span>
                    </div>
                </label>
                <label class="hc-activity-card">
                    <input type="radio" name="hc-pal" value="1.9">
                    <div class="hc-card-content">
                        <strong>Ekstra Aktif</strong>
                        <span>Çok ağır fiziksel iş veya profesyonel sporcu.</span>
                    </div>
                </label>
            </div>
        </div>

        <div class="hc-form-group">
            <label>Bazal Metabolizma Hızı (BMR) - Opsiyonel</label>
            <input type="number" id="hc-bmr-val" placeholder="Örn: 1800" step="1">
            <small>TDEE (Günlük toplam yakılan kalori) hesaplamak için BMR değerinizi girin.</small>
        </div>

        <button class="hc-btn" onclick="hcPalHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pal-result">
            <div class="hc-res-grid">
                <div class="hc-res-item">
                    <span class="hc-res-label">Aktivite Katsayısı (PAL)</span>
                    <strong id="hc-res-pal-val">1.2</strong>
                </div>
                <div class="hc-res-item" id="hc-res-tdee-box" style="display:none;">
                    <span class="hc-res-label">Günlük Kalori İhtiyacı (TDEE)</span>
                    <strong id="hc-res-tdee-val">0</strong>
                    <small>kcal / gün</small>
                </div>
            </div>
        </div>
    </div>
    <?php
}
