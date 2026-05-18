<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_teleskop_gorus_alani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-teleskop-gorus-alani-hesaplama',
        HC_PLUGIN_URL . 'modules/teleskop-gorus-alani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-teleskop-gorus-alani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/teleskop-gorus-alani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-teleskop-gorus-alani-hesaplama">
        <div class="hc-cal-header">
            <h3>Teleskop Görüş Alanı Hesaplama</h3>
            <p>Teleskop ve göz merceği parametrelerinize göre, gökyüzüne baktığınızda görebileceğiniz gerçek dairesel gökyüzü alanının çapını (Derece cinsinden) hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-tga-f-tel">Teleskop Odak Uzaklığı (mm)</label>
            <input type="number" id="hc-tga-f-tel" class="hc-input" placeholder="örn. 1000" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-tga-f-eye">Oküler Odak Uzaklığı (mm)</label>
            <input type="number" id="hc-tga-f-eye" class="hc-input" placeholder="örn. 25" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-tga-afov">Oküler Görünür Görüş Alanı (AFoV - Derece)</label>
            <input type="number" id="hc-tga-afov" class="hc-input" value="52" step="any" min="1" max="120">
            <span style="font-size: 11px; color: #777;">Plössl: 50°-52°, Erfle: 60°-68°, Nagler/Geniş Açı: 82°, Ethos: 100°</span>
        </div>

        <button class="hc-btn" onclick="hcTeleskopGorusAlaniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-teleskop-gorus-alani-hesaplama-result">
            <div class="hc-result-title">Görüş Alanı Analizi</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Gerçek Görüş Alanı (TFoV):</span>
                <span class="hc-result-value" id="hc-tga-res-tfov">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Büyütme Çarpanı:</span>
                <span class="hc-result-value" id="hc-tga-res-mag">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Ay Çapı Karşılığı:</span>
                <span class="hc-result-value" id="hc-tga-res-moon">-</span>
            </div>
            <div class="hc-result-desc" id="hc-tga-desc"></div>
        </div>
    </div>
    <?php
}
