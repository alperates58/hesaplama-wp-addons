<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_standart_sapma_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-standart-sapma-hesaplayici',
        HC_PLUGIN_URL . 'modules/standart-sapma-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-standart-sapma-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/standart-sapma-hesaplayici/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-standart-sapma-hesaplayici">
        <div class="hc-header">
            <h3>Standart Sapma Hesaplayıcı</h3>
            <p>Sayıları virgülle ayırarak girin (örn: 10, 20, 30).</p>
        </div>
        
        <div class="hc-form-group">
            <label>Veri Seti (Sayılar)</label>
            <textarea id="hc-sd-input" placeholder="10, 15, 23, 12, 18" rows="3"></textarea>
        </div>

        <div class="hc-form-group">
            <label>Hesaplama Türü</label>
            <select id="hc-sd-type">
                <option value="pop">Popülasyon (n)</option>
                <option value="sam">Örneklem (n-1)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSdHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sd-result">
            <div class="hc-sd-grid">
                <div class="hc-sd-item">
                    <label>Ortalama (μ)</label>
                    <div id="hc-res-mean">-</div>
                </div>
                <div class="hc-sd-item">
                    <label>Standart Sapma (σ)</label>
                    <div id="hc-res-sd">-</div>
                </div>
                <div class="hc-sd-item">
                    <label>Varyans (σ²)</label>
                    <div id="hc-res-var">-</div>
                </div>
                <div class="hc-sd-item">
                    <label>Eleman Sayısı (n)</label>
                    <div id="hc-res-count">-</div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
