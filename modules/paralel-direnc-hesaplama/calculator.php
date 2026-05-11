<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_paralel_direnc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-paralel-direnc',
        HC_PLUGIN_URL . 'modules/paralel-direnc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-paralel-direnc-css',
        HC_PLUGIN_URL . 'modules/paralel-direnc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-paralel-direnc">
        <h3>Paralel Direnç Hesaplama</h3>
        <p class="hc-desc">Direnç değerlerini Ohm (Ω) cinsinden girin.</p>
        
        <div id="hc-direnc-list">
            <div class="hc-input-row">
                <input type="number" class="hc-direnc-val" placeholder="Direnç 1" step="any">
                <button class="hc-remove-btn" onclick="this.parentElement.remove()">×</button>
            </div>
            <div class="hc-input-row">
                <input type="number" class="hc-direnc-val" placeholder="Direnç 2" step="any">
                <button class="hc-remove-btn" onclick="this.parentElement.remove()">×</button>
            </div>
        </div>

        <button class="hc-btn-secondary" onclick="hcDirencEkle()">+ Ekle</button>
        <button class="hc-btn" onclick="hcDirencHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-direnc-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Eşdeğer Direnç (Req):</span>
                <span class="hc-result-value" id="hc-direnc-res-total">--</span>
                <span class="hc-result-unit">Ω</span>
            </div>
        </div>
    </div>
    <?php
}
