<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karakter_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-karakter-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/karakter-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-karakter-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/karakter-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-char-count">
        <h3>Karakter Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <textarea id="hc-cc-text" placeholder="Metninizi yazın..." rows="6" oninput="hcKarakterSayısıHesapla()"></textarea>
        </div>
        <div class="hc-result visible">
            <div class="hc-cc-grid">
                <div class="hc-cc-item">
                    <span>Boşluklu</span>
                    <strong id="hc-cc-with">0</strong>
                </div>
                <div class="hc-cc-item">
                    <span>Boşluksuz</span>
                    <strong id="hc-cc-without">0</strong>
                </div>
                <div class="hc-cc-item">
                    <span>Satır Sayısı</span>
                    <strong id="hc-cc-lines">0</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
