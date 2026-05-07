<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_bezi_tuketimi( $atts ) {
    wp_enqueue_script(
        'hc-bebek-bezi',
        HC_PLUGIN_URL . 'modules/bebek-bezi-tuketimi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bebek-bezi-css',
        HC_PLUGIN_URL . 'modules/bebek-bezi-tuketimi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-bezi">
        <h3>Bebek Bezi Tüketimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bbt-ay">Bebeğiniz Kaç Aylık?</label>
            <input type="number" id="hc-bbt-ay" placeholder="Örn: 4" min="0" max="36">
        </div>

        <div class="hc-form-group">
            <label for="hc-bbt-fiyat">Birim Bezi Fiyatı (₺) - Opsiyonel</label>
            <input type="number" id="hc-bbt-fiyat" placeholder="Örn: 8.5" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcBebekBeziHesapla()">Tüketimi Hesapla</button>
        
        <div class="hc-result" id="hc-bebek-bezi-tuketimi-result">
            <div class="hc-diaper-summary">
                <div class="hc-diaper-card">
                    <span class="hc-d-label">Günlük Tüketim</span>
                    <strong id="hc-res-bbt-gun">0 Adet</strong>
                </div>
                <div class="hc-diaper-card">
                    <span class="hc-d-label">Aylık Tüketim</span>
                    <strong id="hc-res-bbt-ay">0 Adet</strong>
                </div>
            </div>

            <div id="hc-bbt-maliyet-group" style="display:none; margin-top: 15px; padding: 15px; border: 1px solid #dce5f0; border-radius: 12px; background: #fff;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                    <span>Aylık Tahmini Maliyet:</span>
                    <strong id="hc-res-bbt-m-ay">0 ₺</strong>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span>Yıllık Tahmini Maliyet:</span>
                    <strong id="hc-res-bbt-m-yil">0 ₺</strong>
                </div>
            </div>

            <div style="margin-top: 20px; font-size: 13px; color: var(--hc-front-muted); line-height: 1.5;">
                * Bebek bezi tüketimi bebeğin yaşı ilerledikçe azalır. Yenidoğanlar günde 10-12 bez tüketirken, 1 yaşından sonra bu sayı 4-6 adede düşer.
            </div>
        </div>
    </div>
    <?php
}
