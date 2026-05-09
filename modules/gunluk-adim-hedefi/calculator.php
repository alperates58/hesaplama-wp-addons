<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_adim_hedefi( $atts ) {
    wp_enqueue_script(
        'hc-step-goal',
        HC_PLUGIN_URL . 'modules/gunluk-adim-hedefi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-step-target">
        <h3>Günlük Adım Hedefi Belirleyici</h3>
        
        <div class="hc-form-group">
            <label for="hc-sg-goal">Hedefiniz</label>
            <select id="hc-sg-goal">
                <option value="health">Genel Sağlık ve Zindelik</option>
                <option value="weightloss">Kilo Vermek</option>
                <option value="maintenance">Kilo Korumak</option>
                <option value="fit">Üst Düzey Kondisyon</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sg-current">Şu Anki Aktivite Seviyeniz</label>
            <select id="hc-sg-current">
                <option value="sedentary">Hareketsiz (İş/Ev)</option>
                <option value="light">Az Hareketli</option>
                <option value="active">Hareketli / Spor Yapan</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcAdımHedefiHesapla()">Hedefi Belirle</button>

        <div class="hc-result" id="hc-step-goal-result">
            <div class="hc-result-item">
                <span>Önerilen Günlük Adım:</span>
                <div class="hc-result-value" id="hc-sg-value">-</div>
            </div>
            <div id="hc-sg-desc" style="margin-top: 15px; font-size: 0.9em; text-align: center;">
                <!-- JS -->
            </div>
        </div>
    </div>
    <?php
}
