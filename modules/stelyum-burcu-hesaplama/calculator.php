<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stelyum_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stelyum',
        HC_PLUGIN_URL . 'modules/stelyum-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stelyum-css',
        HC_PLUGIN_URL . 'modules/stelyum-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stelyum">
        <div class="hc-header">
            <h3>Stelyum (Gezegen Kümelenmesi) Hesaplama</h3>
            <p class="hc-subtitle">Doğum haritanızda bir burçta toplanan 3 veya daha fazla gezegenin gücünü, deha alanınızı ve kadersel temalarınızı keşfedin.</p>
        </div>

        <!-- 1. ADIM: DOĞUM BİLGİLERİ (OTOMATİK HESAPLAMA) -->
        <div class="hc-st-section hc-st-birth-section">
            <div class="hc-st-section-title">
                <span class="hc-st-step-badge">1</span>
                <span>Doğum Bilgileriniz (Otomatik Konum Tespiti)</span>
            </div>
            <p class="hc-st-section-desc">Doğum bilgilerinizi girerek Güneş, Ay, Yükselen ve tüm gezegen burçlarınızı tek tıkla otomatik doldurabilirsiniz.</p>

            <div class="hc-form-grid-3">
                <div class="hc-form-group">
                    <label for="hc-st-tarih">Doğum Tarihi *</label>
                    <input type="date" id="hc-st-tarih" value="1995-05-15">
                </div>
                <div class="hc-form-group">
                    <label for="hc-st-saat">Doğum Saati</label>
                    <input type="time" id="hc-st-saat" value="12:00">
                    <div class="hc-st-checkbox-group">
                        <label class="hc-st-inline-label">
                            <input type="checkbox" id="hc-st-saat-bilinmiyor" onchange="hcStelyumSaatDegisti(this)"> Saati tam bilmiyorum (12:00 al)
                        </label>
                    </div>
                </div>
                <div class="hc-form-group">
                    <label for="hc-st-sehir">Doğum Yeri (İl) *</label>
                    <select id="hc-st-sehir">
                        <option value="35.3213,37.0000">Adana</option>
                        <option value="38.2761,37.7641">Adıyaman</option>
                        <option value="30.5403,38.7637">Afyonkarahisar</option>
                        <option value="43.0566,39.7216">Ağrı</option>
                        <option value="35.8333,40.6500">Amasya</option>
                        <option value="32.8541,39.9207">Ankara</option>
                        <option value="30.7056,36.8841">Antalya</option>
                        <option value="41.8182,41.1827">Artvin</option>
                        <option value="27.8416,37.8560">Aydın</option>
                        <option value="27.8826,39.6483">Balıkesir</option>
                        <option value="30.0665,40.0566">Bilecik</option>
                        <option value="40.7696,39.0626">Bingöl</option>
                        <option value="42.1231,38.3937">Bitlis</option>
                        <option value="31.5788,40.5759">Bolu</option>
                        <option value="30.0665,37.4612">Burdur</option>
                        <option value="29.0634,40.2668">Bursa</option>
                        <option value="26.4141,40.1553">Çanakkale</option>
                        <option value="33.6134,40.6013">Çankırı</option>
                        <option value="34.9555,40.5505">Çorum</option>
                        <option value="29.0863,37.7765">Denizli</option>
                        <option value="40.2306,37.9144">Diyarbakır</option>
                        <option value="26.5622,41.6818">Edirne</option>
                        <option value="39.2263,38.6809">Elazığ</option>
                        <option value="39.5000,39.7500">Erzincan</option>
                        <option value="41.2700,39.9000">Erzurum</option>
                        <option value="30.5205,39.7766">Eskişehir</option>
                        <option value="37.3833,37.0662">Gaziantep</option>
                        <option value="38.3895,40.9128">Giresun</option>
                        <option value="39.5085,40.4385">Gümüşhane</option>
                        <option value="43.7333,37.5833">Hakkari</option>
                        <option value="36.3498,36.4018">Hatay</option>
                        <option value="30.5565,37.7647">Isparta</option>
                        <option value="34.6414,36.8121">Mersin</option>
                        <option value="28.9769,41.0052" selected>İstanbul</option>
                        <option value="27.1287,38.4188">İzmir</option>
                        <option value="43.1000,40.6166">Kars</option>
                        <option value="33.7827,41.3887">Kastamonu</option>
                        <option value="35.4787,38.7312">Kayseri</option>
                        <option value="27.2166,41.7333">Kırklareli</option>
                        <option value="34.1709,39.1424">Kırşehir</option>
                        <option value="29.8815,40.8532">Kocaeli</option>
                        <option value="32.4833,37.8666">Konya</option>
                        <option value="29.9833,39.4166">Kütahya</option>
                        <option value="38.3094,38.3555">Malatya</option>
                        <option value="27.4296,38.6146">Manisa</option>
                        <option value="36.9371,37.5858">Kahramanmaraş</option>
                        <option value="40.7240,37.3212">Mardin</option>
                        <option value="28.3639,37.2155">Muğla</option>
                        <option value="41.4912,38.7347">Muş</option>
                        <option value="34.7141,38.6244">Nevşehir</option>
                        <option value="34.6833,37.9666">Niğde</option>
                        <option value="37.8833,40.9833">Ordu</option>
                        <option value="40.5233,41.0201">Rize</option>
                        <option value="30.3957,40.7569">Sakarya</option>
                        <option value="36.3300,41.2866">Samsun</option>
                        <option value="41.9333,37.9333">Siirt</option>
                        <option value="35.1500,42.0333">Sinop</option>
                        <option value="37.0166,39.7500">Sivas</option>
                        <option value="27.5166,40.9833">Tekirdağ</option>
                        <option value="36.5500,40.3166">Tokat</option>
                        <option value="39.7222,41.0000">Trabzon</option>
                        <option value="39.5500,39.1000">Tunceli</option>
                        <option value="38.7961,37.1590">Şanlıurfa</option>
                        <option value="29.4081,38.6823">Uşak</option>
                        <option value="43.4000,38.5000">Van</option>
                        <option value="34.8147,39.8180">Yozgat</option>
                        <option value="31.7833,41.4500">Zonguldak</option>
                        <option value="34.0369,38.3686">Aksaray</option>
                        <option value="40.2248,40.2551">Bayburt</option>
                        <option value="33.2287,37.1759">Karaman</option>
                        <option value="33.5152,39.8468">Kırıkkale</option>
                        <option value="41.1350,37.8811">Batman</option>
                        <option value="42.4666,37.5166">Şırnak</option>
                        <option value="32.4609,41.5810">Bartın</option>
                        <option value="42.7021,41.1104">Ardahan</option>
                        <option value="44.0048,39.8879">Iğdır</option>
                        <option value="29.2666,40.6500">Yalova</option>
                        <option value="32.6203,41.2061">Karabük</option>
                        <option value="37.1212,36.7183">Kilis</option>
                        <option value="36.2461,37.2130">Osmaniye</option>
                        <option value="31.1565,40.8438">Düzce</option>
                    </select>
                </div>
            </div>

            <button type="button" class="hc-btn hc-st-calc-birth-btn" onclick="hcStelyumHaritaDoldur()">
                ✨ Doğum Haritamdan Gezegenleri Otomatik Doldur
            </button>
        </div>

        <!-- 2. ADIM: GEZEGEN BURÇLARI (MANUEL VEYA OTOMATİK DOLDURULMUŞ) -->
        <div class="hc-st-section hc-st-planets-section">
            <div class="hc-st-section-title">
                <span class="hc-st-step-badge">2</span>
                <span>Haritadaki Gezegen Yerleşimleri</span>
            </div>
            <p class="hc-st-section-desc">Gezegen burçlarınız doğum bilgilerinizden otomatik tespit edilir. Dilerseniz burçları manuel olarak da güncelleyebilirsiniz.</p>

            <div class="hc-form-grid hc-st-planets-grid">
                <!-- Güneş -->
                <div class="hc-form-group hc-st-planet-box">
                    <label for="hc-st-p-gunes"><span class="hc-st-icon">☀️</span> Güneş</label>
                    <select class="hc-input hc-st-planet" id="hc-st-p-gunes" data-planet="Güneş">
                        <option value="yok">Seçiniz</option>
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                    <span class="hc-st-deg-badge" id="hc-st-deg-gunes"></span>
                </div>

                <!-- Ay -->
                <div class="hc-form-group hc-st-planet-box">
                    <label for="hc-st-p-ay"><span class="hc-st-icon">🌙</span> Ay</label>
                    <select class="hc-input hc-st-planet" id="hc-st-p-ay" data-planet="Ay">
                        <option value="yok">Seçiniz</option>
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                    <span class="hc-st-deg-badge" id="hc-st-deg-ay"></span>
                </div>

                <!-- Merkür -->
                <div class="hc-form-group hc-st-planet-box">
                    <label for="hc-st-p-merkur"><span class="hc-st-icon">☿</span> Merkür</label>
                    <select class="hc-input hc-st-planet" id="hc-st-p-merkur" data-planet="Merkür">
                        <option value="yok">Seçiniz</option>
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                    <span class="hc-st-deg-badge" id="hc-st-deg-merkur"></span>
                </div>

                <!-- Venüs -->
                <div class="hc-form-group hc-st-planet-box">
                    <label for="hc-st-p-venus"><span class="hc-st-icon">♀</span> Venüs</label>
                    <select class="hc-input hc-st-planet" id="hc-st-p-venus" data-planet="Venüs">
                        <option value="yok">Seçiniz</option>
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                    <span class="hc-st-deg-badge" id="hc-st-deg-venus"></span>
                </div>

                <!-- Mars -->
                <div class="hc-form-group hc-st-planet-box">
                    <label for="hc-st-p-mars"><span class="hc-st-icon">♂</span> Mars</label>
                    <select class="hc-input hc-st-planet" id="hc-st-p-mars" data-planet="Mars">
                        <option value="yok">Seçiniz</option>
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                    <span class="hc-st-deg-badge" id="hc-st-deg-mars"></span>
                </div>

                <!-- Jüpiter -->
                <div class="hc-form-group hc-st-planet-box">
                    <label for="hc-st-p-jupiter"><span class="hc-st-icon">♃</span> Jüpiter</label>
                    <select class="hc-input hc-st-planet" id="hc-st-p-jupiter" data-planet="Jüpiter">
                        <option value="yok">Seçiniz</option>
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                    <span class="hc-st-deg-badge" id="hc-st-deg-jupiter"></span>
                </div>

                <!-- Satürn -->
                <div class="hc-form-group hc-st-planet-box">
                    <label for="hc-st-p-saturn"><span class="hc-st-icon">♄</span> Satürn</label>
                    <select class="hc-input hc-st-planet" id="hc-st-p-saturn" data-planet="Satürn">
                        <option value="yok">Seçiniz</option>
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                    <span class="hc-st-deg-badge" id="hc-st-deg-saturn"></span>
                </div>

                <!-- Uranüs -->
                <div class="hc-form-group hc-st-planet-box">
                    <label for="hc-st-p-uranus"><span class="hc-st-icon">♅</span> Uranüs</label>
                    <select class="hc-input hc-st-planet" id="hc-st-p-uranus" data-planet="Uranüs">
                        <option value="yok">Seçiniz</option>
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                    <span class="hc-st-deg-badge" id="hc-st-deg-uranus"></span>
                </div>

                <!-- Neptün -->
                <div class="hc-form-group hc-st-planet-box">
                    <label for="hc-st-p-neptun"><span class="hc-st-icon">♆</span> Neptün</label>
                    <select class="hc-input hc-st-planet" id="hc-st-p-neptun" data-planet="Neptün">
                        <option value="yok">Seçiniz</option>
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                    <span class="hc-st-deg-badge" id="hc-st-deg-neptun"></span>
                </div>

                <!-- Plüton -->
                <div class="hc-form-group hc-st-planet-box">
                    <label for="hc-st-p-pluton"><span class="hc-st-icon">♇</span> Plüton</label>
                    <select class="hc-input hc-st-planet" id="hc-st-p-pluton" data-planet="Plüton">
                        <option value="yok">Seçiniz</option>
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                    <span class="hc-st-deg-badge" id="hc-st-deg-pluton"></span>
                </div>

                <!-- Yükselen (Ascendant) -->
                <div class="hc-form-group hc-st-planet-box">
                    <label for="hc-st-p-asc"><span class="hc-st-icon">⬆</span> Yükselen (ASC)</label>
                    <select class="hc-input hc-st-planet" id="hc-st-p-asc" data-planet="Yükselen">
                        <option value="yok">Seçiniz</option>
                        <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                        <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                        <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                        <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                    </select>
                    <span class="hc-st-deg-badge" id="hc-st-deg-asc"></span>
                </div>
            </div>

            <button type="button" class="hc-btn hc-st-main-btn" onclick="hcStelyumHesapla()">
                🔮 Stelyum ve Doğum Haritası Analizini Yap
            </button>
        </div>

        <!-- 3. ADIM: GELİŞMİŞ SONUÇ ALANI -->
        <div class="hc-result" id="hc-st-result">
            <!-- Stelyum Başlık Kartı -->
            <div class="hc-st-summary-card" id="hc-st-summary-card">
                <div class="hc-st-badge-row">
                    <span class="hc-st-badge-type" id="hc-st-badge-type">Stelyum Analizi</span>
                    <span class="hc-st-badge-count" id="hc-st-badge-count"></span>
                </div>
                <div class="hc-st-result-title" id="hc-st-value">-</div>
                <div class="hc-st-result-subtitle" id="hc-st-subtitle"></div>
            </div>

            <!-- Gezegen Dağılım Çizelgesi -->
            <div class="hc-st-card">
                <h4 class="hc-st-card-title">🌌 Haritanızdaki Gezegen Dağılımı</h4>
                <div class="hc-st-planets-chips" id="hc-st-planets-chips"></div>
            </div>

            <!-- Element & Nitelik Dağılımı -->
            <div class="hc-st-card">
                <h4 class="hc-st-card-title">🔥 Element ve Nitelik Dengesi</h4>
                <div class="hc-st-balance-grid">
                    <div class="hc-st-balance-col">
                        <div class="hc-st-col-title">Element Dağılımı</div>
                        <div class="hc-st-bar-wrap">
                            <div class="hc-st-bar-label"><span>Ateş (Koç, Aslan, Yay)</span><span id="hc-el-fire-val">0%</span></div>
                            <div class="hc-st-progress"><div class="hc-st-bar hc-fire" id="hc-el-fire-bar"></div></div>
                        </div>
                        <div class="hc-st-bar-wrap">
                            <div class="hc-st-bar-label"><span>Toprak (Boğa, Başak, Oğlak)</span><span id="hc-el-earth-val">0%</span></div>
                            <div class="hc-st-progress"><div class="hc-st-bar hc-earth" id="hc-el-earth-bar"></div></div>
                        </div>
                        <div class="hc-st-bar-wrap">
                            <div class="hc-st-bar-label"><span>Hava (İkizler, Terazi, Kova)</span><span id="hc-el-air-val">0%</span></div>
                            <div class="hc-st-progress"><div class="hc-st-bar hc-air" id="hc-el-air-bar"></div></div>
                        </div>
                        <div class="hc-st-bar-wrap">
                            <div class="hc-st-bar-label"><span>Su (Yengeç, Akrep, Balık)</span><span id="hc-el-water-val">0%</span></div>
                            <div class="hc-st-progress"><div class="hc-st-bar hc-water" id="hc-el-water-bar"></div></div>
                        </div>
                    </div>

                    <div class="hc-st-balance-col">
                        <div class="hc-st-col-title">Nitelik Dağılımı</div>
                        <div class="hc-st-bar-wrap">
                            <div class="hc-st-bar-label"><span>Öncü (Başlatıcı Güç)</span><span id="hc-mo-card-val">0%</span></div>
                            <div class="hc-st-progress"><div class="hc-st-bar hc-cardinal" id="hc-mo-card-bar"></div></div>
                        </div>
                        <div class="hc-st-bar-wrap">
                            <div class="hc-st-bar-label"><span>Sabit (Sürdürücü & Odaklı)</span><span id="hc-mo-fixed-val">0%</span></div>
                            <div class="hc-st-progress"><div class="hc-st-bar hc-fixed" id="hc-mo-fixed-bar"></div></div>
                        </div>
                        <div class="hc-st-bar-wrap">
                            <div class="hc-st-bar-label"><span>Değişken (Uyum & Esneklik)</span><span id="hc-mo-mut-val">0%</span></div>
                            <div class="hc-st-progress"><div class="hc-st-bar hc-mutable" id="hc-mo-mut-bar"></div></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detaylı Astroloji Raporu Bölümü -->
            <div class="hc-st-analysis-sections" id="hc-st-desc">
                <!-- JS tarafından doldurulacak -->
            </div>
        </div>
    </div>
    <?php
}
