<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_anaerobik_esik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hr-anaerobic',
        HC_PLUGIN_URL . 'modules/anaerobik-esik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hr-anaerobic-css',
        HC_PLUGIN_URL . 'modules/anaerobik-esik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hr-anaerobic">
        <h3>Anaerobik Eşik (AT) Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-at-age">Yaşınız:</label>
            <input type="number" id="hc-at-age" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-at-fitness">Kondisyon Seviyeniz:</label>
            <select id="hc-at-fitness">
                <option value="0.80">Başlangıç (%80 HRmax)</option>
                <option value="0.85" selected>Orta Seviye (%85 HRmax)</option>
                <option value="0.90">İleri Seviye / Atlet (%90 HRmax)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAnaerobicHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hr-anaerobic-result">
            <strong>Tahmini Anaerobik Eşik:</strong>
            <div id="hc-at-res-val" class="hc-result-value">-</div>
            <span>BPM</span>
            <p style="margin-top:15px; font-size:0.8rem;">Bu değerden sonra vücudunuz laktik asit üretmeye başlar ve yorulma hızlanır.</p>
        </div>
    </div>
    <?php
}
