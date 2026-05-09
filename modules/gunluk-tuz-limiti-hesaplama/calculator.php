<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_tuz_limiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-salt-limit',
        HC_PLUGIN_URL . 'modules/gunluk-tuz-limiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-salt-limit">
        <h3>Günlük Tuz Limiti Sorgulama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sl-grams">Tahmini Günlük Tuz Tüketiminiz (Gram)</label>
            <input type="number" id="hc-sl-grams" placeholder="Örn: 10">
            <small>1 çay kaşığı yaklaşık 5 gramdır.</small>
        </div>

        <button class="hc-btn" onclick="hcTuzLimitiHesapla()">Kontrol Et</button>

        <div class="hc-result" id="hc-salt-limit-result">
            <div id="hc-sl-status" style="padding: 15px; border-radius: 8px; text-align: center; font-weight: bold;">
                <!-- Durum -->
            </div>
            <div id="hc-sl-info" style="margin-top: 15px; font-size: 0.9em;">
                <!-- Bilgi -->
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *WHO önerisi: Yetişkinler için günde 5 gramdan (yaklaşık 1 çay kaşığı) az tuz.
            </p>
        </div>
    </div>
    <?php
}
