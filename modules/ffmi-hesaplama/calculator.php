<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ffmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ffmi-hesaplama',
        HC_PLUGIN_URL . 'modules/ffmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ffmi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ffmi-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ffmi-hesaplama">
        <div class="hc-header">
            <h3>FFMI (Yağsız Kütle İndeksi)</h3>
            <p>Kas kütlenizi ve fiziksel gelişiminizi profesyonel standartlarda ölçün.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-ffmi-boy" placeholder="175">
            </div>
            <div class="hc-form-group">
                <label>Kilo (kg)</label>
                <input type="number" id="hc-ffmi-kilo" placeholder="80">
            </div>
            <div class="hc-form-group full-width">
                <label>Vücut Yağ Oranı (%)</label>
                <input type="number" id="hc-ffmi-fat" placeholder="15" step="0.1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcFfmiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ffmi-result">
            <div class="hc-res-box highlight">
                <div class="hc-res-label">DÜZELTİLMİŞ FFMI</div>
                <div class="hc-res-main" id="hc-res-ffmi-adj">0</div>
            </div>
            <div class="hc-res-row">
                <div class="hc-res-sub">
                    <span>Ham FFMI:</span>
                    <strong id="hc-res-ffmi-raw">0</strong>
                </div>
                <div class="hc-res-sub">
                    <span>Durum:</span>
                    <strong id="hc-res-ffmi-cat">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
