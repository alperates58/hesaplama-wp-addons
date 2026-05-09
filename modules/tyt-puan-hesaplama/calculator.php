<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tyt_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tyt-puan-hesaplama',
        HC_PLUGIN_URL . 'modules/tyt-puan-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-tyt-puan-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tyt-puan-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tyt-puan-hesaplama">
        <h3>TYT Puan Hesaplama</h3>

        <div class="hc-tyt-puan-hesaplama-grid">
            <div class="hc-tyt-puan-hesaplama-test">
                <h4>Türkçe <span>40 soru</span></h4>
                <div class="hc-tyt-puan-hesaplama-fields">
                    <div class="hc-form-group">
                        <label for="hc-tyt-turkce-dogru">Doğru</label>
                        <input type="number" id="hc-tyt-turkce-dogru" min="0" max="40" step="1" placeholder="0-40" />
                    </div>
                    <div class="hc-form-group">
                        <label for="hc-tyt-turkce-yanlis">Yanlış</label>
                        <input type="number" id="hc-tyt-turkce-yanlis" min="0" max="40" step="1" placeholder="0-40" />
                    </div>
                </div>
            </div>

            <div class="hc-tyt-puan-hesaplama-test">
                <h4>Sosyal Bilimler <span>20 soru</span></h4>
                <div class="hc-tyt-puan-hesaplama-fields">
                    <div class="hc-form-group">
                        <label for="hc-tyt-sosyal-dogru">Doğru</label>
                        <input type="number" id="hc-tyt-sosyal-dogru" min="0" max="20" step="1" placeholder="0-20" />
                    </div>
                    <div class="hc-form-group">
                        <label for="hc-tyt-sosyal-yanlis">Yanlış</label>
                        <input type="number" id="hc-tyt-sosyal-yanlis" min="0" max="20" step="1" placeholder="0-20" />
                    </div>
                </div>
            </div>

            <div class="hc-tyt-puan-hesaplama-test">
                <h4>Temel Matematik <span>40 soru</span></h4>
                <div class="hc-tyt-puan-hesaplama-fields">
                    <div class="hc-form-group">
                        <label for="hc-tyt-matematik-dogru">Doğru</label>
                        <input type="number" id="hc-tyt-matematik-dogru" min="0" max="40" step="1" placeholder="0-40" />
                    </div>
                    <div class="hc-form-group">
                        <label for="hc-tyt-matematik-yanlis">Yanlış</label>
                        <input type="number" id="hc-tyt-matematik-yanlis" min="0" max="40" step="1" placeholder="0-40" />
                    </div>
                </div>
            </div>

            <div class="hc-tyt-puan-hesaplama-test">
                <h4>Fen Bilimleri <span>20 soru</span></h4>
                <div class="hc-tyt-puan-hesaplama-fields">
                    <div class="hc-form-group">
                        <label for="hc-tyt-fen-dogru">Doğru</label>
                        <input type="number" id="hc-tyt-fen-dogru" min="0" max="20" step="1" placeholder="0-20" />
                    </div>
                    <div class="hc-form-group">
                        <label for="hc-tyt-fen-yanlis">Yanlış</label>
                        <input type="number" id="hc-tyt-fen-yanlis" min="0" max="20" step="1" placeholder="0-20" />
                    </div>
                </div>
            </div>
        </div>

        <div class="hc-tyt-puan-hesaplama-obp">
            <div class="hc-form-group">
                <label for="hc-tyt-diploma">Diploma Notu (50-100, isteğe bağlı)</label>
                <input type="number" id="hc-tyt-diploma" min="50" max="100" step="0.01" placeholder="Örn: 84,50" />
            </div>
            <div class="hc-form-group">
                <label for="hc-tyt-obp-katsayi">OBP Katsayısı</label>
                <select id="hc-tyt-obp-katsayi">
                    <option value="0.12">İlk yerleşme: 0,12</option>
                    <option value="0.06">Önceki yıl yerleşen: 0,06</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcTytPuanHesapla()">Puanı Hesapla</button>

        <div class="hc-result" id="hc-tyt-puan-hesaplama-result">
            <p class="hc-tyt-puan-hesaplama-note">Sonuçlar tahmini hesaplamadır, resmi sınav sonucu değildir.</p>
            <div class="hc-tyt-puan-hesaplama-summary">
                <div>
                    <span>Ham TYT Puanı</span>
                    <strong id="hc-tyt-ham-puan"></strong>
                </div>
                <div>
                    <span>Yerleştirme Puanı</span>
                    <strong id="hc-tyt-yerlestirme-puani"></strong>
                </div>
                <div>
                    <span>Toplam Net</span>
                    <strong id="hc-tyt-toplam-net"></strong>
                </div>
            </div>
            <div class="hc-tyt-puan-hesaplama-result-grid" id="hc-tyt-netler"></div>
            <p class="hc-tyt-puan-hesaplama-warning" id="hc-tyt-uyari"></p>
        </div>
    </div>
    <?php
}
