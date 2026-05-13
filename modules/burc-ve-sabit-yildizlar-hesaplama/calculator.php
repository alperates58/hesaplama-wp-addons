<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_ve_sabit_yildizlar_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sabit-yildiz',
        HC_PLUGIN_URL . 'modules/burc-ve-sabit-yildizlar-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sabit-yildiz-css',
        HC_PLUGIN_URL . 'modules/burc-ve-sabit-yildizlar-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sabit-yildiz">
        <div class="hc-header">
            <h3>Sabit Yıldızlar (Kraliyet Yıldızları) Analizi</h3>
            <p>Haritanızdaki gezegenler kadim yıldızlarla temas ediyor mu? Kadersel etkileri keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-sy-sign">Burç Seçin</label>
                <select id="hc-sy-sign" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-sy-deg">Derece (0-29)</label>
                <input type="number" id="hc-sy-deg" class="hc-input" min="0" max="29" placeholder="Örn: 10">
            </div>
        </div>

        <button class="hc-btn" onclick="hcSabitYildizHesapla()">Yıldız Etkisini Kontrol Et</button>

        <div class="hc-result" id="hc-sy-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Yıldız Teması:</span>
                <span class="hc-result-value" id="hc-sy-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-sy-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
