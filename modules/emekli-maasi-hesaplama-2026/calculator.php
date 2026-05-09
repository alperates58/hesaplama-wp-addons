<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emekli_maasi_hesaplama_2026( $atts ) {
    wp_enqueue_script(
        'hc-emekli-maasi-hesaplama-2026',
        HC_PLUGIN_URL . 'modules/emekli-maasi-hesaplama-2026/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-emekli-maasi-hesaplama-2026-css',
        HC_PLUGIN_URL . 'modules/emekli-maasi-hesaplama-2026/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-emekli-maasi-hesaplama-2026">
        <h3>Emekli Maaşı Hesaplama 2026</h3>

        <div class="hc-emekli-maasi-hesaplama-2026-grid">
            <div class="hc-form-group">
                <label for="hc-emekli-sigorta">Sigorta Tipi</label>
                <select id="hc-emekli-sigorta">
                    <option value="4A">4A - SSK</option>
                    <option value="4B">4B - Bağ-Kur</option>
                    <option value="4C">4C - Emekli Sandığı</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-emekli-baslangic">Sigorta Başlangıç Tarihi</label>
                <input type="date" id="hc-emekli-baslangic" />
            </div>

            <div class="hc-form-group">
                <label for="hc-emekli-kazanc">Aylık Ortalama Brüt Kazanç (TL)</label>
                <input type="number" id="hc-emekli-kazanc" min="0" step="100" placeholder="TL" />
            </div>

            <div class="hc-form-group">
                <label for="hc-emekli-hizmet">Toplam Hizmet Yılı</label>
                <input type="number" id="hc-emekli-hizmet" min="1" max="60" step="0.5" placeholder="yıl" />
            </div>

            <div class="hc-form-group">
                <label for="hc-emekli-kesinti">Aylık Kesinti (TL)</label>
                <input type="number" id="hc-emekli-kesinti" min="0" step="10" value="0" placeholder="TL" />
            </div>

            <div class="hc-form-group">
                <label for="hc-emekli-ek-odeme">Ek Ödeme Oranı (%)</label>
                <input type="number" id="hc-emekli-ek-odeme" min="0" max="10" step="0.1" value="4" placeholder="%" />
            </div>
        </div>

        <button class="hc-btn hc-emekli-maasi-hesaplama-2026-btn" onclick="hcEmekliMaasiHesapla2026()">Hesapla</button>

        <div class="hc-result" id="hc-emekli-maasi-hesaplama-2026-result">
            <div class="hc-emekli-maasi-hesaplama-2026-summary">
                <span>Hesaba yatacak tahmini aylık</span>
                <strong class="hc-result-value" id="hc-emekli-net"></strong>
            </div>

            <table class="hc-emekli-maasi-hesaplama-2026-table">
                <tbody>
                    <tr>
                        <td>Aylık bağlama oranı</td>
                        <td id="hc-emekli-abo"></td>
                    </tr>
                    <tr>
                        <td>2026 zammı öncesi tahmini kök aylık</td>
                        <td id="hc-emekli-kok"></td>
                    </tr>
                    <tr>
                        <td>2026 zam oranı</td>
                        <td id="hc-emekli-zam"></td>
                    </tr>
                    <tr>
                        <td>Zamlı kök aylık</td>
                        <td id="hc-emekli-zamli"></td>
                    </tr>
                    <tr>
                        <td>Ek ödeme</td>
                        <td id="hc-emekli-ek"></td>
                    </tr>
                    <tr>
                        <td>Taban aylık desteği</td>
                        <td id="hc-emekli-destek"></td>
                    </tr>
                    <tr>
                        <td>Kesinti</td>
                        <td id="hc-emekli-kesinti-sonuc"></td>
                    </tr>
                    <tr>
                        <td>Yıllık tahmini ödeme</td>
                        <td id="hc-emekli-yillik"></td>
                    </tr>
                </tbody>
            </table>

            <p class="hc-emekli-maasi-hesaplama-2026-note" id="hc-emekli-not"></p>
        </div>
    </div>
    <?php
}
