<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akim_bolucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akim-bolucu',
        HC_PLUGIN_URL . 'modules/akim-bolucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-akim-bolucu-css',
        HC_PLUGIN_URL . 'modules/akim-bolucu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-akim-bolucu">
        <h3>Akım Bölücü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ab-itoplam">Toplam Akım (Iₜ)</label>
            <input type="number" id="hc-ab-itoplam" placeholder="Amper (A)" step="0.01">
        </div>

        <div id="hc-ab-resistors">
            <div class="hc-ab-resistor-row">
                <label>Direnç 1 (R₁)</label>
                <input type="number" class="hc-ab-r-input" placeholder="Ohm (Ω)" step="0.1">
            </div>
            <div class="hc-ab-resistor-row">
                <label>Direnç 2 (R₂)</label>
                <input type="number" class="hc-ab-r-input" placeholder="Ohm (Ω)" step="0.1">
            </div>
        </div>

        <button class="hc-btn-secondary" onclick="hcAkimBolucuDirenclEkle()" style="margin-bottom: 10px; width: 100%;">Direnç Ekle +</button>
        <button class="hc-btn" onclick="hcAkimBolucuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-akim-bolucu-result">
            <div class="hc-result-item">
                <span>Eşdeğer Direnç (Rₑ):</span>
                <span id="hc-ab-res-req">-</span>
            </div>
            <div id="hc-ab-current-list">
                <!-- Akımlar buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
