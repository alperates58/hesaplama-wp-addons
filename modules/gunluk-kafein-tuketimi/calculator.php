<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_kafein_tuketimi( $atts ) {
    wp_enqueue_script(
        'hc-gunluk-kafein-tuketimi',
        HC_PLUGIN_URL . 'modules/gunluk-kafein-tuketimi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gunluk-kafein-tuketimi-css',
        HC_PLUGIN_URL . 'modules/gunluk-kafein-tuketimi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gunluk-kafein-tuketimi">
        <h3>Günlük Kafein Tüketimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gkt-durum">Durumunuz</label>
            <select id="hc-gkt-durum">
                <option value="yetiskin">Yetişkin</option>
                <option value="gebe">Gebe / Emziren</option>
                <option value="cocuk">Çocuk / Ergen</option>
            </select>
        </div>

        <div id="hc-gkt-kilo-group" class="hc-form-group" style="display:none;">
            <label for="hc-gkt-kilo">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-gkt-kilo" placeholder="Örn: 45">
        </div>

        <div class="hc-kafein-items">
            <div class="hc-form-group">
                <label>Siyah Çay (Bardak)</label>
                <input type="number" class="hc-gkt-input" data-mg="45" value="0" min="0">
            </div>
            <div class="hc-form-group">
                <label>Filtre Kahve (Fincan)</label>
                <input type="number" class="hc-gkt-input" data-mg="95" value="0" min="0">
            </div>
            <div class="hc-form-group">
                <label>Türk Kahvesi (Fincan)</label>
                <input type="number" class="hc-gkt-input" data-mg="60" value="0" min="0">
            </div>
            <div class="hc-form-group">
                <label>Espresso (Shot)</label>
                <input type="number" class="hc-gkt-input" data-mg="63" value="0" min="0">
            </div>
            <div class="hc-form-group">
                <label>Kola / Soda (330ml Kutu)</label>
                <input type="number" class="hc-gkt-input" data-mg="35" value="0" min="0">
            </div>
            <div class="hc-form-group">
                <label>Enerji İçeceği (250ml)</label>
                <input type="number" class="hc-gkt-input" data-mg="80" value="0" min="0">
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcKafeinHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gunluk-kafein-tuketimi-result">
            <div style="text-align: center; margin-bottom: 20px;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Toplam Tüketilen Kafein</span>
                <span class="hc-result-value" id="hc-gkt-res-toplam">0 mg</span>
            </div>

            <div class="hc-progress-container">
                <div class="hc-progress-bar" id="hc-gkt-progress"></div>
            </div>

            <div style="margin-top: 15px;">
                <table class="hc-gkt-table">
                    <tr>
                        <td>Güvenli Limitiniz:</td>
                        <td id="hc-gkt-res-limit">400 mg</td>
                    </tr>
                    <tr>
                        <td>Kalan Hakkınız:</td>
                        <td id="hc-gkt-res-kalan">400 mg</td>
                    </tr>
                    <tr>
                        <td>Durum:</td>
                        <td id="hc-gkt-res-durum" style="font-weight:700;">Normal</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('hc-gkt-durum').addEventListener('change', function() {
        const kiloGroup = document.getElementById('hc-gkt-kilo-group');
        kiloGroup.style.display = this.value === 'cocuk' ? 'block' : 'none';
    });
    </script>
    <?php
}
