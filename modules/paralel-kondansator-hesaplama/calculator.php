<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_paralel_kondansator_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-paralel-kond',
        HC_PLUGIN_URL . 'modules/paralel-kondansator-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-paralel-kond-css',
        HC_PLUGIN_URL . 'modules/paralel-kondansator-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-paralel-kond">
        <h3>Paralel Kondansatör Hesaplama</h3>
        <p class="hc-desc">Değerleri Farad (F) veya Mikrofarad (µF) gibi aynı birimden girin.</p>
        
        <div id="hc-kond-list">
            <div class="hc-input-row">
                <input type="number" class="hc-kond-val" placeholder="Kondansatör 1" step="any">
                <button class="hc-remove-btn" onclick="this.parentElement.remove()">×</button>
            </div>
            <div class="hc-input-row">
                <input type="number" class="hc-kond-val" placeholder="Kondansatör 2" step="any">
                <button class="hc-remove-btn" onclick="this.parentElement.remove()">×</button>
            </div>
        </div>

        <button class="hc-btn-secondary" onclick="hcKondEkle()">+ Ekle</button>
        <button class="hc-btn" onclick="hcKondHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-kond-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Kapasitans:</span>
                <span class="hc-result-value" id="hc-kond-res-total">--</span>
            </div>
        </div>
    </div>
    <?php
}
