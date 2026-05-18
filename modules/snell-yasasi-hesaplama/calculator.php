<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_snell_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-snell-yasasi-hesaplama',
        HC_PLUGIN_URL . 'modules/snell-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-snell-yasasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/snell-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-snell-yasasi-hesaplama">
        <div class="hc-cal-header">
            <h3>Snell Yasası Hesaplama</h3>
            <p>Kırılma indisleri farklı iki ortam arasında geçiş yapan ışık ışınının gelme açısına göre kırılma açısını ve tam yansıma için kritik açıyı hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sny-n1">1. Ortam Kırılma İndisi (n₁)</label>
            <input type="number" id="hc-sny-n1" class="hc-input" value="1.0" step="any" min="1.0">
            <span style="font-size: 11px; color: #777;">Hava: 1.0, Su: 1.33, Cam: 1.5, Elmas: 2.42</span>
        </div>

        <div class="hc-form-group">
            <label for="hc-sny-n2">2. Ortam Kırılma İndisi (n₂)</label>
            <input type="number" id="hc-sny-n2" class="hc-input" value="1.5" step="any" min="1.0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sny-theta1">Gelme Açısı (θ₁ - Derece)</label>
            <input type="number" id="hc-sny-theta1" class="hc-input" placeholder="örn. 30" step="any" min="0" max="90">
        </div>

        <button class="hc-btn" onclick="hcSnellYasasiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-snell-yasasi-hesaplama-result">
            <div class="hc-result-title">Kırılma ve Optik Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kırılma Açısı (θ₂):</span>
                <span class="hc-result-value" id="hc-sny-res-theta2">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kritik Açı (θ_c):</span>
                <span class="hc-result-value" id="hc-sny-res-thetac">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Işığın Kırılma Davranışı:</span>
                <span class="hc-result-value" id="hc-sny-res-behavior">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sny-desc"></div>
        </div>
    </div>
    <?php
}
