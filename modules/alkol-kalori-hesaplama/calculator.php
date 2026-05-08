<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alkol_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alcohol-calories',
        HC_PLUGIN_URL . 'modules/alkol-kalori-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-alcohol">
        <h3>Alkol Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-alc-type">İçecek Türü</label>
            <select id="hc-alc-type">
                <option value="45">Bira (330 ml) - ~150 kcal</option>
                <option value="80">Şarap (100 ml) - ~80 kcal</option>
                <option value="220">Rakı (100 ml) - ~220 kcal</option>
                <option value="250">Viski / Votka / Cin (100 ml) - ~250 kcal</option>
                <option value="150">Likit / Kokteyl (Ortalama 100 ml) - ~150 kcal</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-alc-amount">Miktar (ml)</label>
            <input type="number" id="hc-alc-amount" placeholder="Örn: 500">
        </div>

        <button class="hc-btn" onclick="hcAlkolKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-alcohol-calories-result">
            <div class="hc-result-item">
                <span>Tahmini Alkol Kalorisi:</span>
                <div class="hc-result-value" id="hc-alc-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Alkol kalorisi "boş kalori" olarak bilinir ve vücutta yağ depolanmasını artırabilir. Hesaplama ortalama değerler üzerinden yapılmıştır.
            </p>
        </div>
    </div>
    <?php
}
