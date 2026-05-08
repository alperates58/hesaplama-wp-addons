<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ev_isi_kalori_yakimi( $atts ) {
    wp_enqueue_script(
        'hc-housework-calories',
        HC_PLUGIN_URL . 'modules/ev-isi-kalori-yakimi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-housework">
        <h3>Ev İşi Kalori Yakımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-hi-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-hi-weight" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-hi-activity">Ev İşi Türü</label>
            <select id="hc-hi-activity">
                <option value="3.5">Elektrikli Süpürge / Yer Silme</option>
                <option value="4.0">Bahçe İşleri (Hafif-Orta)</option>
                <option value="5.0">Bahçe İşleri (Ağır/Toprak Kazma)</option>
                <option value="3.2">Cam Silme</option>
                <option value="2.0">Yemek Yapma / Mutfak İşleri</option>
                <option value="1.8">Ütü Yapma</option>
                <option value="2.3">Toz Alma / Hafif Temizlik</option>
                <option value="3.0">Mobilya Taşıma / Ağır Temizlik</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-hi-duration">Süre (Dakika)</label>
            <input type="number" id="hc-hi-duration" placeholder="Dakika">
        </div>

        <button class="hc-btn" onclick="hcEvIsiKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-housework-calories-result">
            <div class="hc-result-item">
                <span>Yakılan Tahmini Kalori:</span>
                <div class="hc-result-value" id="hc-hi-value">-</div>
            </div>
        </div>
    </div>
    <?php
}
