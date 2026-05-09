<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_venn_diyagrami_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-venn',
        HC_PLUGIN_URL . 'modules/venn-diyagrami-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-venn-css',
        HC_PLUGIN_URL . 'modules/venn-diyagrami-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-venn">
        <h3>Venn Diyagramı Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-vn-a">A Kümesi Eleman Sayısı</label>
            <input type="number" id="hc-vn-a" value="10" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-vn-b">B Kümesi Eleman Sayısı</label>
            <input type="number" id="hc-vn-b" value="15" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-vn-i">A ∩ B (Kesişim) Sayısı</label>
            <input type="number" id="hc-vn-i" value="4" min="0">
        </div>
        <button class="hc-btn" onclick="hcVennHesapla()">Kümeleri Analiz Et</button>
        <div class="hc-result" id="hc-venn-result">
            <div class="hc-vn-viz">
                <div class="hc-vn-circle a">A</div>
                <div class="hc-vn-circle b">B</div>
            </div>
            <div class="hc-vn-stats">
                <div class="hc-vn-stat"> <span>A Birleşim B (A ∪ B):</span> <b id="hc-res-vn-u">0</b> </div>
                <div class="hc-vn-stat"> <span>Sadece A (A - B):</span> <b id="hc-res-vn-aonly">0</b> </div>
                <div class="hc-vn-stat"> <span>Sadece B (B - A):</span> <b id="hc-res-vn-bonly">0</b> </div>
            </div>
        </div>
    </div>
    <?php
}
