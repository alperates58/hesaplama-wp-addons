<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_egzersiz_kalori_yakimi( $atts ) {
    wp_enqueue_script(
        'hc-exercise-calories',
        HC_PLUGIN_URL . 'modules/egzersiz-kalori-yakimi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-exercise">
        <h3>Egzersiz Kalori Yakımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-ec-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-ec-weight" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-ec-activity">Egzersiz Türü</label>
            <select id="hc-ec-activity">
                <option value="3.5">Yürüyüş (Orta Tempo, 5 km/sa)</option>
                <option value="5.0">Hızlı Yürüyüş (6.5 km/sa)</option>
                <option value="8.0">Koşu (8 km/sa)</option>
                <option value="11.5">Hızlı Koşu (12 km/sa)</option>
                <option value="7.5">Bisiklet (Orta Tempo, 20 km/sa)</option>
                <option value="6.0">Yüzme (Yavaş/Orta Tempo)</option>
                <option value="10.0">Yüzme (Hızlı/Kulaçlı)</option>
                <option value="8.0">Ağırlık Antrenmanı (Sıkı)</option>
                <option value="11.0">İp Atlama</option>
                <option value="7.0">Futbol/Basketbol</option>
                <option value="4.5">Yoga/Pilates</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ec-duration">Süre (Dakika)</label>
            <input type="number" id="hc-ec-duration" placeholder="Dakika">
        </div>

        <button class="hc-btn" onclick="hcEgzersizKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-exercise-calories-result">
            <div class="hc-result-item">
                <span>Tahmini Yakılan Kalori:</span>
                <div class="hc-result-value" id="hc-ec-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Hesaplama MET (Metabolik Eşdeğer) yöntemiyle yapılmıştır. Gerçek yakım kişiden kişiye (kas kütlesi, yaş vb.) değişiklik gösterebilir.
            </p>
        </div>
    </div>
    <?php
}
