<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_adim_kalori_yakimi( $atts ) {
    wp_enqueue_script(
        'hc-step-calories',
        HC_PLUGIN_URL . 'modules/adim-kalori-yakimi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-step">
        <h3>Adım Kalori Yakımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-ac-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-ac-weight" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-ac-steps">Adım Sayısı</label>
            <input type="number" id="hc-ac-steps" placeholder="Örn: 10000">
        </div>

        <button class="hc-btn" onclick="hcAdımKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-step-calories-result">
            <div class="hc-result-item">
                <span>Yakılan Tahmini Kalori:</span>
                <div class="hc-result-value" id="hc-ac-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Hesaplama ortalama adım uzunluğu ve orta tempo yürüyüş MET değeri baz alınarak yapılmıştır.
            </p>
        </div>
    </div>
    <?php
}
