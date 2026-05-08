<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_luteal_faz_suresi( $atts ) {
    wp_enqueue_script(
        'hc-luteal-phase',
        HC_PLUGIN_URL . 'modules/luteal-faz-suresi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-luteal">
        <h3>Luteal Faz Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-lf-cycle">Ortalama Döngü Süreniz (Gün)</label>
            <input type="number" id="hc-lf-cycle" value="28">
        </div>

        <div class="hc-form-group">
            <label for="hc-lf-ovul">Yumurtlama Günü (Adet başlangıcından itibaren)</label>
            <input type="number" id="hc-lf-ovul" value="14">
        </div>

        <button class="hc-btn" onclick="hcLutealHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-luteal-faz-result">
            <div class="hc-result-item">
                <span>Luteal Faz Süresi:</span>
                <div class="hc-result-value" id="hc-lf-value">-</div>
            </div>
            <p id="hc-lf-status" style="margin-top: 15px; font-size: 0.9em; text-align: center; font-weight: bold;">
                <!-- Durum -->
            </p>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *Luteal faz, yumurtlama ile bir sonraki adet arasındaki süredir. 10 günden kısa olması 'Luteal Faz Yetmezliği' olarak adlandırılabilir.
            </p>
        </div>
    </div>
    <?php
}
