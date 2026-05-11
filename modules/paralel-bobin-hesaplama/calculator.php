<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_paralel_bobin_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-paralel-bobin',
        HC_PLUGIN_URL . 'modules/paralel-bobin-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-paralel-bobin-css',
        HC_PLUGIN_URL . 'modules/paralel-bobin-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-paralel-bobin">
        <h3>Paralel Bobin Hesaplama</h3>
        <p class="hc-desc">Endüktans değerlerini Henry (H) veya Milihenry (mH) gibi aynı birimden girin.</p>
        
        <div id="hc-bobin-list">
            <div class="hc-input-row">
                <input type="number" class="hc-bobin-val" placeholder="Bobin 1" step="any">
                <button class="hc-remove-btn" onclick="this.parentElement.remove()">×</button>
            </div>
            <div class="hc-input-row">
                <input type="number" class="hc-bobin-val" placeholder="Bobin 2" step="any">
                <button class="hc-remove-btn" onclick="this.parentElement.remove()">×</button>
            </div>
        </div>

        <button class="hc-btn-secondary" onclick="hcBobinEkle()">+ Ekle</button>
        <button class="hc-btn" onclick="hcBobinHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-bobin-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Eşdeğer Endüktans (Leq):</span>
                <span class="hc-result-value" id="hc-bobin-res-total">--</span>
            </div>
        </div>
    </div>
    <?php
}
