<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_overclock_guc_artisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-overclock-guc-artisi-hesaplama',
        HC_PLUGIN_URL . 'modules/overclock-guc-artisi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-overclock-guc">
        <h3>Overclock Güç Artışı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ocg-temel-guc">Temel Güç Tüketimi / TDP (Watt)</label>
            <input type="number" id="hc-ocg-temel-guc" min="1" value="125" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ocg-temel-frekans">Varsayılan Çekirdek Frekansı (MHz)</label>
            <input type="number" id="hc-ocg-temel-frekans" min="1" value="3600" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ocg-hedef-frekans">Hedef Çekirdek Frekansı (Overclock - MHz)</label>
            <input type="number" id="hc-ocg-hedef-frekans" min="1" value="4200" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ocg-temel-voltaj">Varsayılan Çekirdek Voltajı (V - Volt)</label>
            <input type="number" id="hc-ocg-temel-voltaj" min="0.1" step="0.001" value="1.200" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ocg-hedef-voltaj">Hedef Çekirdek Voltajı (Overclock - V - Volt)</label>
            <input type="number" id="hc-ocg-hedef-voltaj" min="0.1" step="0.001" value="1.325" />
            <small style="color:#666;font-size:12px;">Voltaj değişimleri güç tüketimini karesel olarak etkiler. Küçük adımlarla artırılmalıdır.</small>
        </div>

        <button class="hc-btn" onclick="hcOverclockGucArtisiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-overclock-guc-result">
            <table>
                <tr>
                    <td>Güç Artış Oranı</td>
                    <td><strong class="hc-result-value" id="hc-ocg-res-oran" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Yeni Güç Tüketimi (TDP)</td>
                    <td><strong id="hc-ocg-res-yeni-guc" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Ek Soğutma / Güç Kaynağı Marj İhtiyacı</td>
                    <td><strong id="hc-ocg-res-ek-guc">-</strong></td>
                </tr>
                <tr>
                    <td>Güvenlik ve Sıcaklık Değerlendirmesi</td>
                    <td><strong id="hc-ocg-res-yorum">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
