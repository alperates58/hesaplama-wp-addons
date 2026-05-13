<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saturn_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-saturn-uyum',
        HC_PLUGIN_URL . 'modules/saturn-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-saturn-uyum-css',
        HC_PLUGIN_URL . 'modules/saturn-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-saturn-uyum">
        <div class="hc-header">
            <h3>Satürn Burcu Uyumu Hesaplama</h3>
            <p>Zorluklar karşısında ne kadar dayanıklısınız? Sorumluluk ve sadakat uyumunuzu keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-su-sign1">Sizin Satürn Burcunuz</label>
                <select id="hc-su-sign1" class="hc-input">
                    <option value="koc">Koç</option>
                    <option value="boga">Boğa</option>
                    <option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option>
                    <option value="aslan">Aslan</option>
                    <option value="basak">Başak</option>
                    <option value="terazi">Terazi</option>
                    <option value="akrep">Akrep</option>
                    <option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option>
                    <option value="kova">Kova</option>
                    <option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-su-sign2">Onun Satürn Burcunuz</label>
                <select id="hc-su-sign2" class="hc-input">
                    <option value="koc">Koç</option>
                    <option value="boga">Boğa</option>
                    <option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option>
                    <option value="aslan">Aslan</option>
                    <option value="basak">Başak</option>
                    <option value="terazi">Terazi</option>
                    <option value="akrep">Akrep</option>
                    <option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option>
                    <option value="kova">Kova</option>
                    <option value="balik">Balık</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcSaturnUyumHesapla()">Bağlılık Potansiyelimizi Gör</button>

        <div class="hc-result" id="hc-su-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Sorumluluk ve Sabır Skoru:</span>
                <span class="hc-result-value" id="hc-su-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-su-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
