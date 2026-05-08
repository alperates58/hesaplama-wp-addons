<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_spor_kalori_yakimi( $atts ) {
    wp_enqueue_script(
        'hc-sports-calories',
        HC_PLUGIN_URL . 'modules/spor-kalori-yakimi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sports">
        <h3>Spor Kalori Yakımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-sc-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-sc-weight" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-sc-sport">Spor Dalı</label>
            <select id="hc-sc-sport">
                <optgroup label="Takım Sporları">
                    <option value="7.0">Futbol</option>
                    <option value="6.0">Basketbol (Genel)</option>
                    <option value="8.0">Basketbol (Maç/Yüksek Tempo)</option>
                    <option value="4.0">Voleybol</option>
                    <option value="8.0">Hentbol</option>
                </optgroup>
                <optgroup label="Raket Sporları">
                    <option value="7.3">Tenis (Tekler)</option>
                    <option value="5.0">Tenis (Çiftler)</option>
                    <option value="7.0">Badminton</option>
                    <option value="4.0">Masa Tenisi</option>
                    <option value="12.0">Squash</option>
                </optgroup>
                <optgroup label="Dövüş Sporları">
                    <option value="10.0">Boks (Maç)</option>
                    <option value="7.0">Boks (Antrenman/Torba)</option>
                    <option value="10.0">Karate/Judo/Tekvando</option>
                    <option value="6.0">Güreş</option>
                </optgroup>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sc-duration">Süre (Dakika)</label>
            <input type="number" id="hc-sc-duration" placeholder="Dakika">
        </div>

        <button class="hc-btn" onclick="hcSporKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sports-calories-result">
            <div class="hc-result-item">
                <span>Yakılan Tahmini Kalori:</span>
                <div class="hc-result-value" id="hc-sc-value">-</div>
            </div>
        </div>
    </div>
    <?php
}
