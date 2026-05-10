<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gri_su_geri_kazanim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gri-su-geri-kazanim-hesaplama',
        HC_PLUGIN_URL . 'modules/gri-su-geri-kazanim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gri-su-geri-kazanim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gri-su-geri-kazanim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-greywater">
        <h3>Gri Su Geri Kazanım</h3>
        <div class="hc-form-group">
            <label for="hc-gw-persons">Kişi Sayısı</label>
            <input type="number" id="hc-gw-persons" value="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-gw-usage">Geri Kazanım Alanları</label>
            <div class="hc-check-grid">
                <label><input type="checkbox" class="hc-gw-source" value="40" checked> Duş ve Banyo (40 L/gün)</label>
                <label><input type="checkbox" class="hc-gw-source" value="15" checked> Lavabo (15 L/gün)</label>
                <label><input type="checkbox" class="hc-gw-source" value="15"> Çamaşır Makinesi (15 L/gün)</label>
            </div>
        </div>
        <button class="hc-btn" onclick="hcGriSuGeriKazanımHesapla()">Tasarrufu Hesapla</button>
        <div class="hc-result" id="hc-gw-result">
            <div class="hc-result-label">Yıllık Su Tasarrufu:</div>
            <div class="hc-result-value" id="hc-gw-val">-</div>
            <p id="hc-gw-info" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
