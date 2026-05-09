<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_yuzde_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ortalama-yuzde-hesaplama',
        HC_PLUGIN_URL . 'modules/ortalama-yuzde-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ortalama-yuzde-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ortalama-yuzde-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ortalama-yuzde-hesaplama">
        <div class="hc-header">
            <h3>Ortalama Yüzde Hesaplama</h3>
            <p>Yüzde değerlerini virgülle ayırarak girin (Örn: 10, 20, 50).</p>
        </div>
        
        <div class="hc-form-group">
            <label>Yüzdeler Listesi</label>
            <textarea id="hc-avgp-input" placeholder="20, 45, 60" rows="3"></textarea>
        </div>

        <button class="hc-btn" onclick="hcAvgPHesapla()">Ortalamayı Hesapla</button>

        <div class="hc-result" id="hc-avgp-result">
            <div class="hc-res-box">
                <div class="hc-res-label">ORTALAMA YÜZDE</div>
                <div class="hc-res-main">
                    %<span id="hc-res-avgp-val">0</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
