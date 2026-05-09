<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oyun_konsolu_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-console-power',
        HC_PLUGIN_URL . 'modules/oyun-konsolu-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-console-power-css',
        HC_PLUGIN_URL . 'modules/oyun-konsolu-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-console-power">
        <h3>Oyun Konsolu Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-cp-type">Konsol Tipi</label>
            <select id="hc-cp-type">
                <option value="200">PlayStation 5 / Xbox Series X (200W)</option>
                <option value="80">Xbox Series S (80W)</option>
                <option value="150">PlayStation 4 Pro (150W)</option>
                <option value="15">Nintendo Switch - Docked (15W)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-cp-hours">Günlük Oyun Süresi (Saat)</label>
            <input type="number" id="hc-cp-hours" value="4" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-cp-standby">Günlük Bekleme (Rest Mode) Süresi (Saat)</label>
            <input type="number" id="hc-cp-standby" value="20" step="1">
        </div>

        <button class="hc-btn" onclick="hcKonsolHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-cp-result">
            <div class="hc-result-item">
                <span>Aylık Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-cp-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Tahmini Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-cp-cost">-</span>
            </div>
            <div class="hc-result-note">
                * Bekleme modu tüketimi ortalama 2-5W arası baz alınmıştır.
            </div>
        </div>
    </div>
    <?php
}
