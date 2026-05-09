<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_veraset_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-veraset-vergi',
        HC_PLUGIN_URL . 'modules/veraset-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-veraset-vergi-css',
        HC_PLUGIN_URL . 'modules/veraset-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-veraset-vergisi-hesaplama">
        <h3>Veraset Vergisi Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-vv-value">Miras Kalan Matrah (TL)</label>
            <input type="number" id="hc-vv-value" placeholder="İstisnalar düşülmüş net tutar">
        </div>

        <div class="hc-form-group">
            <label for="hc-vv-type">Yakınlık Derecesi</label>
            <select id="hc-vv-type">
                <option value="direct">Eş ve Çocuklar (Füru)</option>
                <option value="other">Diğer Kişiler</option>
                <option value="gift">İvazsız İntikaller (Bağış)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcVerasetVergisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-veraset-result">
            <div class="hc-result-value" id="hc-vv-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Ödenecek Vergi</p>
        </div>
    </div>
    <?php
}
