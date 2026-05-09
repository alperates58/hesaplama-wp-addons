<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bagkur_primi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bagkur-prim',
        HC_PLUGIN_URL . 'modules/bagkur-primi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bagkur-prim-css',
        HC_PLUGIN_URL . 'modules/bagkur-primi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bagkur-primi-hesaplama">
        <h3>Bağkur Primi Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-bk-base">Beyan Edilen Aylık Kazanç (TL)</label>
            <input type="number" id="hc-bk-base" placeholder="Minimum: 33.030 ₺">
            <small>Brüt asgari ücret ile bunun 7.5 katı arasında bir tutar giriniz.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-bk-discount">5 Puanlık İndirim</label>
            <select id="hc-bk-discount">
                <option value="1">Uygulansın (Düzenli Ödeyen)</option>
                <option value="0">Uygulanmasın</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcBagkurPrimHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bagkur-result">
            <div class="hc-result-item">
                <span>Normal Prim Oranı (%34.5):</span>
                <strong id="hc-bk-res-normal">-</strong>
            </div>
            <div class="hc-result-value" id="hc-bk-res-final">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Aylık Ödenecek Bağkur Primi</p>
        </div>
    </div>
    <?php
}
