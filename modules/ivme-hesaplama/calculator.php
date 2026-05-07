<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ivme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ivme-hesaplama',
        HC_PLUGIN_URL . 'modules/ivme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ivme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ivme-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ivme-hesaplama">
        <div class="hc-header">
            <h3>İvme Hesaplama</h3>
            <p>Hız farkını ve zamanı girerek ivmeyi bulun.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Hız Birimi</label>
                <select id="hc-acc-unit">
                    <option value="ms">m/s (Metre/Saniye)</option>
                    <option value="kmh">km/h (Kilometre/Saat)</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>İlk Hız (v₀)</label>
                <input type="number" id="hc-acc-v0" placeholder="0" step="any">
            </div>
            <div class="hc-form-group">
                <label>Son Hız (v)</label>
                <input type="number" id="hc-acc-v1" placeholder="100" step="any">
            </div>
            <div class="hc-form-group">
                <label>Zaman (t - saniye)</label>
                <input type="number" id="hc-acc-time" placeholder="Örn: 10" step="any">
            </div>
        </div>

        <button class="hc-btn" onclick="hcIvmeHesapla()">İvme Hesapla</button>

        <div class="hc-result" id="hc-acc-result">
            <div class="hc-res-label">HESAPLANAN İVME (a)</div>
            <div class="hc-res-main">
                <span id="hc-res-acc-val">0</span>
                <small>m/s²</small>
            </div>
            <div class="hc-formula-box">
                a = (v - v₀) / t
            </div>
        </div>
    </div>
    <?php
}
