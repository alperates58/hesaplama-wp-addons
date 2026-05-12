<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kek_kalibi_olcu_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cake-pan-js',
        HC_PLUGIN_URL . 'modules/kek-kalibi-olcu-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cake-pan-css',
        HC_PLUGIN_URL . 'modules/kek-kalibi-olcu-donusumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cake-pan">
        <h3>Kek Kalıbı Ölçü Dönüşümü</h3>
        
        <div class="hc-pan-grid">
            <div class="hc-pan-box">
                <h4>Tarifteki Kalıp</h4>
                <div class="hc-form-group">
                    <label>Şekil</label>
                    <select id="hc-pan-old-shape">
                        <option value="circle">Yuvarlak</option>
                        <option value="square">Kare / Dikdörtgen</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label>Boyut (cm)</label>
                    <input type="number" id="hc-pan-old-size" value="20" placeholder="Çap veya Kenar">
                </div>
            </div>

            <div class="hc-pan-box">
                <h4>Elinizdeki Kalıp</h4>
                <div class="hc-form-group">
                    <label>Şekil</label>
                    <select id="hc-pan-new-shape">
                        <option value="circle">Yuvarlak</option>
                        <option value="square">Kare / Dikdörtgen</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label>Boyut (cm)</label>
                    <input type="number" id="hc-pan-new-size" value="24" placeholder="Çap veya Kenar">
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcKekKalibiDonustur()">Katsayıyı Hesapla</button>

        <div class="hc-result" id="hc-cake-pan-result">
            <div class="hc-result-item">
                <span>Malzeme Çarpanı:</span>
                <strong class="hc-result-value" id="hc-pan-res-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-pan-res-note"></div>
        </div>
    </div>
    <?php
}
