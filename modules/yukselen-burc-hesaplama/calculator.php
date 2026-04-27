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
                <option value="41.0082,28.9784">İstanbul</option>
                <option value="39.9334,32.8597">Ankara</option>
                <option value="38.4237,27.1428">İzmir</option>
                <option value="40.1828,29.0665">Bursa</option>
                <option value="36.8969,30.7133">Antalya</option>
                <option value="37.0662,37.3833">Gaziantep</option>
                <option value="37.8746,32.4932">Konya</option>
                <option value="36.8121,34.6415">Mersin</option>
                <option value="37.0000,35.3213">Adana</option>
                <option value="41.2867,36.33">Samsun</option>
                <option value="39.7767,30.5206">Eskişehir</option>
                <option value="37.9144,40.2306">Diyarbakır</option>
                <option value="40.9839,37.8764">Ordu</option>
                <option value="39.9208,41.2744">Erzurum</option>
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
