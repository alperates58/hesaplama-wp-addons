<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_haritasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogum-haritasi-hesaplama',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-dogum-haritasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-dogum-haritasi" id="hc-dogum-haritasi-hesaplama">
        <h3>Doğum Haritası Hesaplama</h3>

        <div class="hc-dogum-haritasi-grid">
            <div class="hc-form-group">
                <label for="hc-dhh-tarih">Doğum Tarihi</label>
                <input type="date" id="hc-dhh-tarih" />
            </div>

            <div class="hc-form-group">
                <label for="hc-dhh-saat">Doğum Saati</label>
                <input type="time" id="hc-dhh-saat" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-dhh-utc">Doğum anındaki UTC farkı</label>
            <select id="hc-dhh-utc">
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
            <small class="hc-dogum-haritasi-not">Türkiye doğumları için çoğu güncel kayıt UTC+3 ile hesaplanır; eski yaz saati kayıtlarında fark değişebilir.</small>
        </div>

        <div class="hc-dogum-haritasi-grid">
            <div class="hc-form-group">
                <label for="hc-dhh-enlem">Doğum yeri enlemi</label>
                <input type="number" id="hc-dhh-enlem" min="-66" max="66" step="0.0001" placeholder="örn: 41.0082" />
            </div>

            <div class="hc-form-group">
                <label for="hc-dhh-boylam">Doğum yeri boylamı</label>
                <input type="number" id="hc-dhh-boylam" min="-180" max="180" step="0.0001" placeholder="örn: 28.9784" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcDogumHaritasiHesapla()">Hesapla</button>

        <div class="hc-result hc-dogum-haritasi-result" id="hc-dhh-result">
            <div class="hc-dogum-haritasi-summary">
                <div>
                    <span>Güneş Burcu</span>
                    <strong id="hc-dhh-gunes"></strong>
                </div>
                <div>
                    <span>Ay Burcu</span>
                    <strong id="hc-dhh-ay"></strong>
                </div>
                <div>
                    <span>Yükselen Burç</span>
                    <strong id="hc-dhh-yukselen"></strong>
                </div>
            </div>

            <div class="hc-dogum-haritasi-table-wrap">
                <table class="hc-dogum-haritasi-table">
                    <thead>
                        <tr>
                            <th>Yerleşim</th>
                            <th>Burç</th>
                            <th>Derece</th>
                            <th>Element</th>
                        </tr>
                    </thead>
                    <tbody id="hc-dhh-tablo"></tbody>
                </table>
            </div>

            <div class="hc-dogum-haritasi-details">
                <div><span>Ateş</span><strong id="hc-dhh-ates"></strong></div>
                <div><span>Toprak</span><strong id="hc-dhh-toprak"></strong></div>
                <div><span>Hava</span><strong id="hc-dhh-hava"></strong></div>
                <div><span>Su</span><strong id="hc-dhh-su"></strong></div>
            </div>

            <p class="hc-dogum-haritasi-yorum" id="hc-dhh-yorum"></p>
            <p class="hc-dogum-haritasi-uyari" id="hc-dhh-uyari"></p>
        </div>
    </div>
    <?php
}
