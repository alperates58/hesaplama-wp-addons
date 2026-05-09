<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_lif_ihtiyaci( $atts ) {
    wp_enqueue_script(
        'hc-fiber',
        HC_PLUGIN_URL . 'modules/gunluk-lif-ihtiyaci/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fiber">
        <h3>Günlük Lif İhtiyacı</h3>
        
        <div class="hc-form-group">
            <label for="hc-fiber-toplam">Günlük Toplam Kalori Alımı (kcal)</label>
            <input type="number" id="hc-fiber-toplam" placeholder="Örn: 2000">
        </div>

        <div class="hc-form-group">
            <label for="hc-fiber-cinsiyet">Cinsiyet (Minimum Değerler İçin)</label>
            <select id="hc-fiber-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kadın</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcLifHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gunluk-lif-result">
            <div class="hc-result-item">
                <span>Önerilen Günlük Lif Miktarı:</span>
                <div class="hc-result-value" id="hc-fiber-value">-</div>
            </div>
            <div id="hc-fiber-info" style="font-size: 0.9em; margin-top: 15px;">
                <p><strong>Genel Öneriler:</strong></p>
                <ul>
                    <li>Kadınlar için minimum: 25 g/gün</li>
                    <li>Erkekler için minimum: 38 g/gün</li>
                    <li>Kalori bazlı hesap: Her 1.000 kcal için 14 g</li>
                </ul>
            </div>
        </div>
    </div>
    <?php
}
