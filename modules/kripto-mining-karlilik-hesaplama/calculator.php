<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_mining_karlilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-mining-karlilik',
        HC_PLUGIN_URL . 'modules/kripto-mining-karlilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-mining-karlilik-css',
        HC_PLUGIN_URL . 'modules/kripto-mining-karlilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-mining-karlilik-hesaplama">
        <h3>Kripto Mining Karlılık Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kmk-has">Kazım Gücü (Hash Rate) (MH/s)</label>
            <input type="number" id="hc-kmk-has" placeholder="Örn: 100" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kmk-odul">Blok Ödülü (Coin)</label>
            <input type="number" id="hc-kmk-odul" placeholder="Örn: 2" step="any" min="0" value="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-kmk-zorluk">Ağ Toplam Zorluğu (T) (veya Ağ Hashrate'i MH/s)</label>
            <input type="number" id="hc-kmk-zorluk" placeholder="Örn: 5000000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kmk-fiyat">Coin Fiyatı ($)</label>
            <input type="number" id="hc-kmk-fiyat" placeholder="Örn: 15" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kmk-tuketim">Cihaz Güç Tüketimi (Watt)</label>
            <input type="number" id="hc-kmk-tuketim" placeholder="Örn: 250" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kmk-elektrik">Elektrik Tarifesi (₺ veya $ / kWh)</label>
            <input type="number" id="hc-kmk-elektrik" placeholder="Örn: 2.50" step="any" min="0" value="2.50">
        </div>
        <button class="hc-btn" onclick="hcKriptoMiningKarlilikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kmk-result">
            <h4>Madencilik Gelir ve Gider Projeksiyonu:</h4>
            <table>
                <thead>
                    <tr>
                        <th>Dönem</th>
                        <th>Brüt Gelir</th>
                        <th>Elektrik Maliyeti</th>
                        <th>Net Kar / Zarar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Günlük</td>
                        <td id="hc-kmk-res-gun-gelir">0.00</td>
                        <td id="hc-kmk-res-gun-gider" style="color:var(--hc-front-red);">0.00</td>
                        <td id="hc-kmk-res-gun-net" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Aylık (30 Gün)</td>
                        <td id="hc-kmk-res-ay-gelir">0.00</td>
                        <td id="hc-kmk-res-ay-gider" style="color:var(--hc-front-red);">0.00</td>
                        <td id="hc-kmk-res-ay-net" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Yıllık (365 Gün)</td>
                        <td id="hc-kmk-res-yil-gelir">0.00</td>
                        <td id="hc-kmk-res-yil-gider" style="color:var(--hc-front-red);">0.00</td>
                        <td id="hc-kmk-res-yil-net" style="font-weight:bold;">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}