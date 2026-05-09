<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_ders_agirlikli_ortalama_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-ders-agirlikli-ortalama-hesaplama', HC_PLUGIN_URL . 'modules/ders-agirlikli-ortalama-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-ders-agirlikli-ortalama-hesaplama-css', HC_PLUGIN_URL . 'modules/ders-agirlikli-ortalama-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-ders-agirlikli-ortalama-hesaplama">
        <h3>Ders Ağırlıklı Ortalama Hesaplama</h3>
        <div id="hc-dao-satirlar">
            <div class="hc-dao-satir hc-form-group">
                <input type="number" class="hc-dao-not" placeholder="Not (0-100)" min="0" max="100" step="0.1" />
                <input type="number" class="hc-dao-kredi" placeholder="Kredi/Ağırlık" min="0" step="0.5" />
            </div>
            <div class="hc-dao-satir hc-form-group">
                <input type="number" class="hc-dao-not" placeholder="Not (0-100)" min="0" max="100" step="0.1" />
                <input type="number" class="hc-dao-kredi" placeholder="Kredi/Ağırlık" min="0" step="0.5" />
            </div>
            <div class="hc-dao-satir hc-form-group">
                <input type="number" class="hc-dao-not" placeholder="Not (0-100)" min="0" max="100" step="0.1" />
                <input type="number" class="hc-dao-kredi" placeholder="Kredi/Ağırlık" min="0" step="0.5" />
            </div>
        </div>
        <button type="button" class="hc-btn hc-btn-secondary" onclick="hcDaoDerEkle()" style="margin-bottom:10px;background:#6c757d;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcDersAgirlikliOrtalamaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ders-agirlikli-ortalama-hesaplama-result"></div>
    </div>
    <?php
}
