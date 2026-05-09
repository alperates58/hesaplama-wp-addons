<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzme_kalori_yakimi( $atts ) {
    wp_enqueue_script(
        'hc-swimming-calories',
        HC_PLUGIN_URL . 'modules/yuzme-kalori-yakimi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-swimming">
        <h3>Yüzme Kalori Yakımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-swim-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-swim-weight" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-swim-style">Yüzme Stili / Şiddeti</label>
            <select id="hc-swim-style">
                <option value="6.0">Serbest Stil (Yavaş/Orta)</option>
                <option value="10.0" selected>Serbest Stil (Hızlı/Yüksek Tempo)</option>
                <option value="10.3">Kurbağalama (Gelişmiş)</option>
                <option value="9.5">Sırtüstü</option>
                <option value="13.8">Kelebekleme</option>
                <option value="7.0">Su Jimnastiği / Aerobik</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-swim-duration">Süre (Dakika)</label>
            <input type="number" id="hc-swim-duration" placeholder="Dakika">
        </div>

        <button class="hc-btn" onclick="hcYüzmeKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-swimming-calories-result">
            <div class="hc-result-item">
                <span>Yakılan Tahmini Kalori:</span>
                <div class="hc-result-value" id="hc-swim-value">-</div>
            </div>
        </div>
    </div>
    <?php
}
