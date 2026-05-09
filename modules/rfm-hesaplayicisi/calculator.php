<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rfm_hesaplayicisi( $atts ) {
    wp_enqueue_script(
        'hc-rfm-hesaplayicisi',
        HC_PLUGIN_URL . 'modules/rfm-hesaplayicisi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rfm-hesaplayicisi-css',
        HC_PLUGIN_URL . 'modules/rfm-hesaplayicisi/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rfm-hesaplayicisi">
        <div class="hc-header">
            <h3>RFM (Göreceli Yağ Kütlesi)</h3>
            <p>Boy ve bel oranınıza göre vücut yağ yüzdenizi hesaplayın.</p>
        </div>
        
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <div class="hc-radio-group">
                <label><input type="radio" name="hc-rfm-gender" value="male" checked> Erkek</label>
                <label><input type="radio" name="hc-rfm-gender" value="female"> Kadın</label>
            </div>
        </div>

        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-rfm-boy" placeholder="175">
            </div>
            <div class="hc-form-group">
                <label>Bel Çevresi (cm)</label>
                <input type="number" id="hc-rfm-bel" placeholder="85">
            </div>
        </div>

        <button class="hc-btn" onclick="hcRfmHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-rfm-result">
            <div class="hc-res-box">
                <div class="hc-res-label">TAHMİNİ VÜCUT YAĞ ORANI</div>
                <div class="hc-res-main">
                    %<span id="hc-res-rfm-val">0</span>
                </div>
                <div class="hc-res-cat" id="hc-res-rfm-cat"></div>
            </div>
        </div>
    </div>
    <?php
}
