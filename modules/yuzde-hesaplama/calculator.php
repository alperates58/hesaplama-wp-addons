<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yuzde-hesaplama',
        HC_PLUGIN_URL . 'modules/yuzde-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yuzde-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yuzde-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yuzde-hesaplama">
        <div class="hc-header">
            <h3>Genel Yüzde Hesaplama</h3>
            <p>Hesaplamak istediğiniz yöntemi seçin.</p>
        </div>
        
        <div class="hc-yuzde-box">
            <div class="hc-yuzde-row">
                <span>Sayı:</span>
                <input type="number" id="hc-y1-val" placeholder="100">
                <span>'ın %</span>
                <input type="number" id="hc-y1-perc" placeholder="20">
                <span>'si kaçtır?</span>
                <button class="hc-mini-btn" onclick="hcYuzdeTip1()">=</button>
            </div>
            <div class="hc-yuzde-res" id="hc-y1-res"></div>
        </div>

        <div class="hc-yuzde-box">
            <div class="hc-yuzde-row">
                <span>Sayı:</span>
                <input type="number" id="hc-y2-val1" placeholder="20">
                <span>sayısı, </span>
                <input type="number" id="hc-y2-val2" placeholder="100">
                <span>'ün yüzde kaçıdır?</span>
                <button class="hc-mini-btn" onclick="hcYuzdeTip2()">=</button>
            </div>
            <div class="hc-yuzde-res" id="hc-y2-res"></div>
        </div>
    </div>
    <?php
}
