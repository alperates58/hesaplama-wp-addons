<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gunes-burcu',
        HC_PLUGIN_URL . 'modules/gunes-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gunes-burcu-css',
        HC_PLUGIN_URL . 'modules/gunes-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gunes-burcu">
        <div class="hc-header">
            <h3>Güneş Burcu Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizi girerek temel karakterinizi, yaşam misyonunuzu ve Güneş burcunuzun tam derecesini keşfedin.</p>
        </div>

        <div class="hc-form-grid-2">
            <div class="hc-form-group">
                <label for="hc-gb-birthdate">Doğum Tarihi *</label>
                <input type="date" id="hc-gb-birthdate" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-gb-time">Doğum Saati (Opsiyonel / Sınır Günleri İçin)</label>
                <input type="time" id="hc-gb-time" value="12:00" class="hc-input">
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcGunesBurcuHesapla()">☀️ Güneş Burcumu Hesapla</button>

        <div class="hc-result" id="hc-gb-result">
            <div class="hc-gb-summary-card">
                <div class="hc-gb-badge-row">
                    <span class="hc-gb-badge-deg" id="hc-gb-deg-badge">-</span>
                    <span class="hc-gb-badge-decan" id="hc-gb-decan-badge">-</span>
                </div>
                <div class="hc-gb-result-title" id="hc-gb-sign-name">-</div>
                <div class="hc-gb-result-subtitle" id="hc-gb-sign-meta">-</div>
            </div>

            <div class="hc-gb-report-card">
                <h4 class="hc-gb-report-title">👑 Temel Karakter ve Yaşam Misyonu</h4>
                <div id="hc-gb-sign-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
