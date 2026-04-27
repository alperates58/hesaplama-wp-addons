<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yukselen_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yukselen-burc-hesaplama',
        HC_PLUGIN_URL . 'modules/yukselen-burc-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-yukselen-burc-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yukselen-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-yukselen-burc" id="hc-yukselen-burc-hesaplama">
        <h3>Yükselen Burç Hesaplama</h3>

        <div class="hc-yukselen-burc-grid">
            <div class="hc-form-group">
                <label for="hc-ybh-tarih">Doğum Tarihi</label>
                <input type="date" id="hc-ybh-tarih" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ybh-saat">Doğum Saati</label>
                <input type="time" id="hc-ybh-saat" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-ybh-sehir">Doğum Yeri</label>
            <select id="hc-ybh-sehir">
                <option value="">Şehir seçin</option>
                <option value="37.0000,35.3213">Adana</option>
                <option value="37.7648,38.2786">Adıyaman</option>
                <option value="38.7569,30.5387">Afyonkarahisar</option>
                <option value="39.7191,43.0503">Ağrı</option>
                <option value="38.3687,34.0370">Aksaray</option>
                <option value="40.6533,35.8331">Amasya</option>
                <option value="39.9334,32.8597">Ankara</option>
                <option value="36.8969,30.7133">Antalya</option>
                <option value="41.1105,42.7022">Ardahan</option>
                <option value="41.1828,41.8183">Artvin</option>
                <option value="37.8560,27.8416">Aydın</option>
                <option value="39.6484,27.8826">Balıkesir</option>
                <option value="41.5811,32.4610">Bartın</option>
                <option value="37.8812,41.1351">Batman</option>
                <option value="40.2552,40.2249">Bayburt</option>
                <option value="40.1426,29.9793">Bilecik</option>
                <option value="38.8855,40.4966">Bingöl</option>
                <option value="38.4006,42.1095">Bitlis</option>
                <option value="40.7350,31.6061">Bolu</option>
                <option value="37.7203,30.2908">Burdur</option>
                <option value="40.1828,29.0665">Bursa</option>
                <option value="40.1553,26.4142">Çanakkale</option>
                <option value="40.6013,33.6134">Çankırı</option>
                <option value="40.5506,34.9556">Çorum</option>
                <option value="37.7765,29.0864">Denizli</option>
                <option value="37.9144,40.2306">Diyarbakır</option>
                <option value="40.8438,31.1565">Düzce</option>
                <option value="41.6771,26.5557">Edirne</option>
                <option value="38.6743,39.2232">Elazığ</option>
                <option value="39.7500,39.5000">Erzincan</option>
                <option value="39.9208,41.2744">Erzurum</option>
                <option value="39.7767,30.5206">Eskişehir</option>
                <option value="37.0662,37.3833">Gaziantep</option>
                <option value="40.9128,38.3895">Giresun</option>
                <option value="40.4603,39.4814">Gümüşhane</option>
                <option value="37.5744,43.7408">Hakkari</option>
                <option value="36.2023,36.1613">Hatay</option>
                <option value="39.9237,44.0450">Iğdır</option>
                <option value="37.7648,30.5566">Isparta</option>
                <option value="41.0082,28.9784">İstanbul</option>
                <option value="38.4237,27.1428">İzmir</option>
                <option value="37.5753,36.9228">Kahramanmaraş</option>
                <option value="41.2061,32.6204">Karabük</option>
                <option value="37.1811,33.2150">Karaman</option>
                <option value="40.6013,43.0975">Kars</option>
                <option value="41.3887,33.7827">Kastamonu</option>
                <option value="38.7205,35.4826">Kayseri</option>
                <option value="39.8468,33.5153">Kırıkkale</option>
                <option value="41.7351,27.2252">Kırklareli</option>
                <option value="39.1425,34.1709">Kırşehir</option>
                <option value="36.7184,37.1212">Kilis</option>
                <option value="40.8533,29.8815">Kocaeli</option>
                <option value="37.8746,32.4932">Konya</option>
                <option value="39.4167,29.9833">Kütahya</option>
                <option value="38.3552,38.3095">Malatya</option>
                <option value="38.6191,27.4289">Manisa</option>
                <option value="37.3122,40.7350">Mardin</option>
                <option value="36.8121,34.6415">Mersin</option>
                <option value="37.2153,28.3636">Muğla</option>
                <option value="38.9462,41.7539">Muş</option>
                <option value="38.6244,34.7239">Nevşehir</option>
                <option value="37.9667,34.6833">Niğde</option>
                <option value="40.9839,37.8764">Ordu</option>
                <option value="37.0742,36.2478">Osmaniye</option>
                <option value="41.0255,40.5177">Rize</option>
                <option value="40.7569,30.3781">Sakarya</option>
                <option value="41.2867,36.3300">Samsun</option>
                <option value="37.9333,41.9500">Siirt</option>
                <option value="42.0279,35.1517">Sinop</option>
                <option value="39.7477,37.0179">Sivas</option>
                <option value="37.1674,38.7955">Şanlıurfa</option>
                <option value="37.4187,42.4918">Şırnak</option>
                <option value="40.9780,27.5110">Tekirdağ</option>
                <option value="40.3167,36.5500">Tokat</option>
                <option value="41.0027,39.7168">Trabzon</option>
                <option value="39.1062,39.5483">Tunceli</option>
                <option value="38.6823,29.4082">Uşak</option>
                <option value="38.5012,43.3730">Van</option>
                <option value="40.6500,29.2667">Yalova</option>
                <option value="39.8200,34.8044">Yozgat</option>
                <option value="41.4564,31.7987">Zonguldak</option>
                <option value="manual">Koordinat gir</option>
            </select>
        </div>

        <div class="hc-yukselen-burc-manuel" id="hc-ybh-manuel">
            <div class="hc-yukselen-burc-grid">
                <div class="hc-form-group">
                    <label for="hc-ybh-enlem">Enlem</label>
                    <input type="number" id="hc-ybh-enlem" min="-66" max="66" step="0.0001" placeholder="örn: 41.0082" />
                </div>

                <div class="hc-form-group">
                    <label for="hc-ybh-boylam">Boylam</label>
                    <input type="number" id="hc-ybh-boylam" min="-180" max="180" step="0.0001" placeholder="örn: 28.9784" />
                </div>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-ybh-utc">Doğum anındaki UTC farkı</label>
            <select id="hc-ybh-utc">
                <option value="3" selected>UTC+3 Türkiye</option>
                <option value="2">UTC+2</option>
                <option value="1">UTC+1</option>
                <option value="0">UTC±0</option>
                <option value="4">UTC+4</option>
                <option value="5">UTC+5</option>
                <option value="5.5">UTC+5:30</option>
                <option value="6">UTC+6</option>
                <option value="7">UTC+7</option>
                <option value="8">UTC+8</option>
                <option value="9">UTC+9</option>
                <option value="10">UTC+10</option>
                <option value="-1">UTC-1</option>
                <option value="-2">UTC-2</option>
                <option value="-3">UTC-3</option>
                <option value="-4">UTC-4</option>
                <option value="-5">UTC-5</option>
                <option value="-6">UTC-6</option>
                <option value="-7">UTC-7</option>
                <option value="-8">UTC-8</option>
            </select>
            <small class="hc-yukselen-burc-not">Türkiye doğumları için çoğu güncel kayıt UTC+3 ile hesaplanır; eski yaz saati kayıtlarında fark değişebilir.</small>
        </div>

        <button class="hc-btn" onclick="hcYukselenBurcHesapla()">Hesapla</button>

        <div class="hc-result hc-yukselen-burc-result" id="hc-ybh-result">
            <div class="hc-yukselen-burc-card">
                <div class="hc-yukselen-burc-symbol" id="hc-ybh-sembol"></div>
                <div>
                    <div class="hc-result-value" id="hc-ybh-burc"></div>
                    <div class="hc-yukselen-burc-degree" id="hc-ybh-derece"></div>
                </div>
            </div>

            <div class="hc-yukselen-burc-details">
                <div><span>Element</span><strong id="hc-ybh-element"></strong></div>
                <div><span>Nitelik</span><strong id="hc-ybh-nitelik"></strong></div>
                <div><span>Yerel yıldız zamanı</span><strong id="hc-ybh-lst"></strong></div>
            </div>

            <p class="hc-yukselen-burc-yorum" id="hc-ybh-yorum"></p>
            <p class="hc-yukselen-burc-uyari" id="hc-ybh-uyari"></p>
        </div>
    </div>
    <?php
}
