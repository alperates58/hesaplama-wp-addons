<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_hareket_sayisi( $atts ) {
    wp_enqueue_script(
        'hc-kick-count',
        HC_PLUGIN_URL . 'modules/bebek-hareket-sayisi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kick-box">
        <h3>Bebek Hareket Takibi (Kick Count)</h3>
        
        <div style="text-align: center; margin-bottom: 20px;">
            <div id="hc-kick-counter" style="font-size: 3em; font-weight: bold; color: #e91e63;">0</div>
            <div>Hareket Sayısı</div>
        </div>

        <div style="display: flex; gap: 10px; margin-bottom: 20px;">
            <button class="hc-btn" style="flex: 2; background: #e91e63;" onclick="hcAddKick()">+ Hareket Kaydet</button>
            <button class="hc-btn" style="flex: 1; background: #666;" onclick="hcResetKick()">Sıfırla</button>
        </div>

        <div id="hc-kick-timer" style="text-align: center; margin-bottom: 20px; font-weight: bold;">
            Süre: 00:00
        </div>

        <div class="hc-result" id="hc-kick-result" style="display: block;">
            <div id="hc-kick-status" style="font-size: 0.9em; line-height: 1.5; text-align: center;">
                *2 saat içinde en az 10 hareket hissetmeniz beklenir. Sayıma başlamak için butona basın.
            </div>
        </div>
    </div>
    <?php
}
