<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cit_diregi_gomme_derinligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cit-diregi-gomme-derinligi-hesaplama',
        HC_PLUGIN_URL . 'modules/cit-diregi-gomme-derinligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cit-diregi-gomme-derinligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cit-diregi-gomme-derinligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cit-diregi-gomme-derinligi-hesaplama">
        <h3>Çit Direği Gömme Derinliği</h3>
        <div class="hc-form-group">
            <label for="hc-cdg-height">Zemin Üstü Çit Yüksekliği (cm)</label>
            <input type="number" id="hc-cdg-height" placeholder="Örn: 150">
        </div>
        <div class="hc-form-group">
            <label for="hc-cdg-soil">Toprak Tipi</label>
            <select id="hc-cdg-soil">
                <option value="0.33">Sert / Sıkışmış Toprak (1/3)</option>
                <option value="0.4">Normal Toprak (2/5)</option>
                <option value="0.5">Gevşek / Kumlu Toprak (1/2)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCDGHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cdg-result">
            <div class="hc-cdg-grid">
                <div class="hc-cdg-item">
                    <span class="hc-result-label">Gömme Derinliği:</span>
                    <span class="hc-result-value" id="hc-cdg-depth">-</span>
                </div>
                <div class="hc-cdg-item">
                    <span class="hc-result-label">Toplam Direk Boyu:</span>
                    <span class="hc-result-value" id="hc-cdg-total">-</span>
                </div>
            </div>
            <div class="hc-result-note">Genel kural olarak direk boyunun en az 1/3'ü toprak altında olmalıdır.</div>
        </div>
    </div>
    <?php
}
