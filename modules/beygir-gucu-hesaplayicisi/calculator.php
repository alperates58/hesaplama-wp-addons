<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beygir_gucu_hesaplayicisi( $atts ) {
    wp_enqueue_script(
        'hc-beygir-gucu-hesaplayicisi',
        HC_PLUGIN_URL . 'modules/beygir-gucu-hesaplayicisi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beygir-gucu-hesaplayicisi-css',
        HC_PLUGIN_URL . 'modules/beygir-gucu-hesaplayicisi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beygir-gucu-hesaplayicisi">
        <div class="hc-header">
            <h3>Beygir Gücü Hesaplayıcısı</h3>
            <p>Motor gücünü HP (PS) veya kW cinsinden kolayca dönüştürün ve hesaplayın.</p>
        </div>
        
        <div class="hc-tabs">
            <button class="hc-tab-btn active" onclick="hcSwitchTab('torque')">Tork & Devir</button>
            <button class="hc-tab-btn" onclick="hcSwitchTab('kw')">kW ↔ HP</button>
        </div>

        <div id="hc-torque-tab" class="hc-tab-content active">
            <div class="hc-form-grid">
                <div class="hc-form-group">
                    <label for="hc-tork">Tork (Nm)</label>
                    <input type="number" id="hc-tork" placeholder="Örn: 350" min="1">
                </div>
                <div class="hc-form-group">
                    <label for="hc-rpm">Devir (RPM)</label>
                    <input type="number" id="hc-rpm" placeholder="Örn: 4000" min="1">
                </div>
            </div>
            <button class="hc-btn" onclick="hcBeygirHesaplaTork()">Hesapla</button>
        </div>

        <div id="hc-kw-tab" class="hc-tab-content">
            <div class="hc-form-grid">
                <div class="hc-form-group">
                    <label for="hc-input-val">Değer Girin</label>
                    <input type="number" id="hc-input-val" placeholder="Örn: 110" step="0.1">
                </div>
                <div class="hc-form-group">
                    <label for="hc-conv-type">Dönüşüm Tipi</label>
                    <select id="hc-conv-type">
                        <option value="kw-to-hp">kW → HP (Beygir)</option>
                        <option value="hp-to-kw">HP (Beygir) → kW</option>
                    </select>
                </div>
            </div>
            <button class="hc-btn" onclick="hcBeygirDonustur()">Dönüştür</button>
        </div>

        <div class="hc-result" id="hc-beygir-result">
            <div class="hc-result-header">Hesaplama Sonucu</div>
            <div class="hc-main-val">
                <strong id="hc-res-primary">-</strong>
                <span id="hc-res-secondary">-</span>
            </div>
        </div>
    </div>
    <?php
}
