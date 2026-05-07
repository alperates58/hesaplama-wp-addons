<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ok_hiz_hesaplayicisi( $atts ) {
    wp_enqueue_script(
        'hc-ok-hiz-hesaplayicisi',
        HC_PLUGIN_URL . 'modules/ok-hiz-hesaplayicisi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ok-hiz-hesaplayicisi-css',
        HC_PLUGIN_URL . 'modules/ok-hiz-hesaplayicisi/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ok-hiz-hesaplayicisi">
        <div class="hc-header">
            <h3>Ok Hız Hesaplayıcısı</h3>
            <p>Yay ve ok parametrelerini girerek tahmini hızı (FPS) bulun.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>IBO Hızı (FPS)</label>
                <input type="number" id="hc-arrow-ibo" value="330" step="1">
            </div>
            <div class="hc-form-group">
                <label>Çekiş Ağırlığı (lbs)</label>
                <input type="number" id="hc-arrow-weight" value="70" step="1">
            </div>
            <div class="hc-form-group">
                <label>Çekiş Mesafesi (inch)</label>
                <input type="number" id="hc-arrow-length" value="29" step="0.5">
            </div>
            <div class="hc-form-group">
                <label>Ok Ağırlığı (grains)</label>
                <input type="number" id="hc-arrow-grains" value="350" step="1">
            </div>
            <div class="hc-form-group full-width">
                <label>Kiriş Üzerindeki Ek Ağırlık (grains)</label>
                <input type="number" id="hc-arrow-string" value="20" step="1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcOkHizHesapla()">Hızı Hesapla</button>

        <div class="hc-result" id="hc-arrow-result">
            <div class="hc-res-label">TAHMİNİ OK HIZI</div>
            <div class="hc-res-main">
                <span id="hc-res-arrow-fps">0</span>
                <small>FPS</small>
            </div>
            <div class="hc-res-info">
                Yüzey Hızı: <span id="hc-res-arrow-mps">0</span> m/s
            </div>
        </div>
    </div>
    <?php
}
