<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bagil_frekans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bagil-frekans-hesaplama',
        HC_PLUGIN_URL . 'modules/bagil-frekans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bagil-frekans-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bagil-frekans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rel-freq">
        <h3>Bağıl Frekans Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rf-freq">Olayın Frekansı (Gözlenme Sayısı):</label>
            <input type="number" id="hc-rf-freq" class="hc-input" placeholder="Örn: 25">
        </div>
        <div class="hc-form-group">
            <label for="hc-rf-total">Toplam Gözlem Sayısı (N):</label>
            <input type="number" id="hc-rf-total" class="hc-input" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcRelFreqHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bagil-frekans-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Ondalık Değer:</span>
                    <strong id="hc-res-rf-dec">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Yüzde Değer:</span>
                    <strong id="hc-res-rf-pct">-</strong>
                </div>
            </div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Formül: f / N</p>
        </div>
    </div>
    <?php
}
