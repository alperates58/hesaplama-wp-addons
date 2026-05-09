<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mikro_besin_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-micro-nutrients',
        HC_PLUGIN_URL . 'modules/mikro-besin-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-micro-nutrients">
        <h3>Mikro Besin İhtiyacı</h3>
        
        <div class="hc-form-group">
            <label for="hc-mn-cinsiyet">Cinsiyet</label>
            <select id="hc-mn-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-mn-yas">Yaş Grubu</label>
            <select id="hc-mn-yas">
                <option value="19-50">19 - 50 Yaş</option>
                <option value="51+">51 Yaş ve Üzeri</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcMikroBesinHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-mikro-besin-result">
            <p style="margin-bottom: 15px;">Günlük önerilen referans alım değerleri (RDA/AI):</p>
            <table style="width: 100%; border-collapse: collapse; font-size: 0.9em;">
                <thead>
                    <tr style="background: #f5f5f5;">
                        <th style="padding: 10px; border: 1px solid #ddd; text-align: left;">Besin Öğesi</th>
                        <th style="padding: 10px; border: 1px solid #ddd; text-align: right;">Miktar</th>
                    </tr>
                </thead>
                <tbody id="hc-mn-table-body">
                    <!-- JS ile doldurulacak -->
                </tbody>
            </table>
            <p style="font-size: 0.8em; color: #666; margin-top: 15px;">
                *Bu değerler sağlıklı yetişkinler için genel referanslardır. Hamilelik, emzirme veya özel sağlık durumlarında ihtiyaçlar değişebilir.
            </p>
        </div>
    </div>
    <?php
}
