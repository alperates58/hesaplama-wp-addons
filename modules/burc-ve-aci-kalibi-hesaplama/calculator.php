<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_ve_aci_kalibi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aci-kalip',
        HC_PLUGIN_URL . 'modules/burc-ve-aci-kalibi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aci-kalip-css',
        HC_PLUGIN_URL . 'modules/burc-ve-aci-kalibi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aci-kalip">
        <div class="hc-header">
            <h3>Astrolojik Açı Kalıpları Hesaplama</h3>
            <p class="hc-subtitle">Doğum haritanızdaki gezegenlerin oluşturduğu Büyük Üçgen, T-Kare, Büyük Kare, Yod (Tanrı'nın Parmağı), Uçurtma, Mistik Dörtgen ve Stelyum geometrilerini otomatik tespit edin.</p>
        </div>

        <div class="hc-ak-tabs">
            <button type="button" class="hc-ak-tab active" onclick="hcAkSetTab('auto')">🎯 Otomatik Harita Analizi</button>
            <button type="button" class="hc-ak-tab" onclick="hcAkSetTab('manual')">📚 Manuel Kalıp İnceleme</button>
        </div>

        <div id="hc-ak-pane-auto" class="hc-ak-pane active">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-ak-date">Doğum Tarihi *</label>
                    <input type="date" id="hc-ak-date" value="1995-05-15" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-ak-time">Doğum Saati (Opsiyonel)</label>
                    <input type="time" id="hc-ak-time" value="12:00" class="hc-input">
                </div>
            </div>
            <button type="button" class="hc-btn" onclick="hcAciKalipOtomatikHesapla()">📐 Haritamdaki Açı Kalıplarını Bul</button>
        </div>

        <div id="hc-ak-pane-manual" class="hc-ak-pane">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-ak-type">Açı Kalıbı Seçin</label>
                    <select id="hc-ak-type" class="hc-input">
                        <option value="tkare">T-Kare (T-Square)</option>
                        <option value="buyukucgen">Büyük Üçgen (Grand Trine)</option>
                        <option value="buyukkare">Büyük Kare (Grand Cross)</option>
                        <option value="yod">Yod (Tanrı'nın Parmağı)</option>
                        <option value="mistikdortgen">Mistik Dörtgen (Mystic Rectangle)</option>
                        <option value="ucurtma">Uçurtma (Kite)</option>
                        <option value="stelyum">Stelyum (Stellium Kümelenmesi)</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label for="hc-ak-element">Baskın Element / Nitelik</label>
                    <select id="hc-ak-element" class="hc-input">
                        <option value="ates">Ateş / Öncü</option>
                        <option value="toprak">Toprak / Sabit</option>
                        <option value="hava">Hava / Değişken</option>
                        <option value="su">Su</option>
                    </select>
                </div>
            </div>
            <button type="button" class="hc-btn" onclick="hcAciKalipManuelHesapla()">📖 Kalıp Rehberini İncele</button>
        </div>

        <div class="hc-result" id="hc-ak-result">
            <div class="hc-ak-hero" id="hc-ak-hero"></div>

            <div class="hc-ak-section">
                <h4 class="hc-ak-sec-title">✨ Tespit Edilen Kalıplar ve Geometrik Yapılar</h4>
                <div id="hc-ak-list" class="hc-ak-list"></div>
            </div>

            <div class="hc-ak-section">
                <h4 class="hc-ak-sec-title">📖 Detaylı Potansiyel ve Çıkış Noktası (Apex) Analizi</h4>
                <div class="hc-result-content" id="hc-ak-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
