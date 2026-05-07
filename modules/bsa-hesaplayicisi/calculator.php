<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bsa_hesaplayicisi( $atts ) {
    wp_enqueue_script(
        'hc-bsa-hesaplayicisi',
        HC_PLUGIN_URL . 'modules/bsa-hesaplayicisi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bsa-hesaplayicisi-css',
        HC_PLUGIN_URL . 'modules/bsa-hesaplayicisi/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bsa-hesaplayicisi">
        <div class="hc-header">
            <h3>BSA (Vücut Yüzey Alanı)</h3>
            <p>Klinik hesaplamalarda kullanılan toplam vücut yüzey alanını bulun.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-bsa-boy" placeholder="175" step="1">
            </div>
            <div class="hc-form-group">
                <label>Kilo (kg)</label>
                <input type="number" id="hc-bsa-kilo" placeholder="70" step="0.1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcBsaHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-bsa-result">
            <div class="hc-res-card">
                <div class="hc-res-label">HESAPLANAN BSA</div>
                <div class="hc-res-main">
                    <span id="hc-res-bsa-val">0</span>
                    <small>m²</small>
                </div>
            </div>
        </div>
    </div>
    <?php
}
