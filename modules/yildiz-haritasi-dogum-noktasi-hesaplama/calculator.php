<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yildiz_haritasi_dogum_noktasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sans-noktasi',
        HC_PLUGIN_URL . 'modules/yildiz-haritasi-dogum-noktasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sans-noktasi-css',
        HC_PLUGIN_URL . 'modules/yildiz-haritasi-dogum-noktasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sans-noktasi">
        <div class="hc-header">
            <h3>Şans Noktası (Pars Fortunae) ve Ruh Noktası Hesaplama</h3>
            <p class="hc-subtitle">Doğum haritanızdaki Güneş, Ay ve Yükselen koordinatlarından en büyük kadersel şans, bolluk ve ruhsal tatmin noktanızı hesaplayın.</p>
        </div>

        <div class="hc-mode-toggle">
            <button type="button" class="hc-mode-btn active" id="hc-sn-btn-auto" onclick="hcSnSetMode('auto')">⚡ Doğum Tarihi & Saatiyle Otomatik Hesapla</button>
            <button type="button" class="hc-mode-btn" id="hc-sn-btn-manual" onclick="hcSnSetMode('manual')">📐 Manuel Derece Girişi</button>
        </div>

        <div id="hc-sn-auto-section">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-sn-bdate">Doğum Tarihi *</label>
                    <input type="date" id="hc-sn-bdate" value="1995-05-15" class="hc-input">
                </div>
                <div class="hc-form-group">
                    <label for="hc-sn-btime">Doğum Saati *</label>
                    <input type="time" id="hc-sn-btime" value="12:00" class="hc-input">
                </div>
            </div>
            <div class="hc-form-group">
                <label for="hc-sn-bcity">Doğum Şehri (Enlem/Boylam için) *</label>
                <select id="hc-sn-bcity" class="hc-input">
                    <option value="39.93,32.85">Ankara (39.93°N, 32.85°E)</option>
                    <option value="41.01,28.97" selected>İstanbul (41.01°N, 28.97°E)</option>
                    <option value="38.42,27.14">İzmir (38.42°N, 27.14°E)</option>
                    <option value="37.00,35.32">Adana (37.00°N, 35.32°E)</option>
                    <option value="36.89,30.70">Antalya (36.89°N, 30.70°E)</option>
                    <option value="40.18,29.06">Bursa (40.18°N, 29.06°E)</option>
                    <option value="37.06,37.38">Gaziantep (37.06°N, 37.38°E)</option>
                    <option value="37.87,32.49">Konya (37.87°N, 32.49°E)</option>
                    <option value="41.29,36.33">Samsun (41.29°N, 36.33°E)</option>
                    <option value="39.75,37.01">Sivas (39.75°N, 37.01°E)</option>
                    <option value="41.00,39.72">Trabzon (41.00°N, 39.72°E)</option>
                    <option value="38.72,35.48">Kayseri (38.72°N, 35.48°E)</option>
                    <option value="37.91,40.24">Diyarbakır (37.91°N, 40.24°E)</option>
                    <option value="39.90,41.27">Erzurum (39.90°N, 41.27°E)</option>
                    <option value="51.50,-0.12">Londra (51.50°N, -0.12°E)</option>
                    <option value="40.71,-74.00">New York (40.71°N, -74.00°E)</option>
                    <option value="52.52,13.40">Berlin (52.52°N, 13.40°E)</option>
                </select>
            </div>
        </div>

        <div id="hc-sn-manual-section" style="display: none;">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label>Güneş Burcu & Derece</label>
                    <select id="hc-sn-sun-sign" class="hc-input">
                        <option value="0">Koç</option><option value="30" selected>Boğa</option><option value="60">İkizler</option>
                        <option value="90">Yengeç</option><option value="120">Aslan</option><option value="150">Başak</option>
                        <option value="180">Terazi</option><option value="210">Akrep</option><option value="240">Yay</option>
                        <option value="270">Oğlak</option><option value="300">Kova</option><option value="330">Balık</option>
                    </select>
                    <input type="number" id="hc-sn-sun-deg" class="hc-input" value="24" placeholder="Derece (0-29)" min="0" max="29">
                </div>
                <div class="hc-form-group">
                    <label>Ay Burcu & Derece</label>
                    <select id="hc-sn-moon-sign" class="hc-input">
                        <option value="0">Koç</option><option value="30">Boğa</option><option value="60">İkizler</option>
                        <option value="90">Yengeç</option><option value="120">Aslan</option><option value="150">Başak</option>
                        <option value="180">Terazi</option><option value="210" selected>Akrep</option><option value="240">Yay</option>
                        <option value="270">Oğlak</option><option value="300">Kova</option><option value="330">Balık</option>
                    </select>
                    <input type="number" id="hc-sn-moon-deg" class="hc-input" value="12" placeholder="Derece (0-29)" min="0" max="29">
                </div>
            </div>
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label>Yükselen (ASC) Burcu & Derece</label>
                    <select id="hc-sn-asc-sign" class="hc-input">
                        <option value="0">Koç</option><option value="30">Boğa</option><option value="60">İkizler</option>
                        <option value="90">Yengeç</option><option value="120" selected>Aslan</option><option value="150">Başak</option>
                        <option value="180">Terazi</option><option value="210">Akrep</option><option value="240">Yay</option>
                        <option value="270">Oğlak</option><option value="300">Kova</option><option value="330">Balık</option>
                    </select>
                    <input type="number" id="hc-sn-asc-deg" class="hc-input" value="18" placeholder="Derece (0-29)" min="0" max="29">
                </div>
                <div class="hc-form-group">
                    <label>Doğum Zamanı (Işık Durumu)</label>
                    <select id="hc-sn-time" class="hc-input">
                        <option value="day">Gündüz Doğumu (ASC + Ay - Güneş)</option>
                        <option value="night">Gece Doğumu (ASC + Güneş - Ay)</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcSansNoktasiHesapla()">✨ Şans Noktamı (Pars Fortunae) Hesapla</button>

        <div class="hc-result" id="hc-sn-result">
            <div class="hc-sn-hero" id="hc-sn-hero"></div>

            <div class="hc-sn-section">
                <h4 class="hc-sn-sec-title">🏺 Arap Noktaları: Şans (Fortuna) & Ruh (Spiritus)</h4>
                <div class="hc-sn-points-grid" id="hc-sn-points"></div>
            </div>

            <div class="hc-sn-section">
                <h4 class="hc-sn-sec-title">📖 Kadersel Zenginlik & Evrensel Akış Rehberi</h4>
                <div class="hc-result-content" id="hc-sn-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
