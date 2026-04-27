<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_konut_kredisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-konut-kredisi-hesaplama',
        HC_PLUGIN_URL . 'modules/konut-kredisi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-konut-kredisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/konut-kredisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-konut-kredisi-hesaplama">
        <h3>Konut Kredisi Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-konut-kredisi-konut-bedeli">Konut Bedeli (₺)</label>
            <input type="number" id="hc-konut-kredisi-konut-bedeli" min="0" step="1000" placeholder="örnek: 3500000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-konut-kredisi-tutar">Kredi Tutarı (₺)</label>
            <input type="number" id="hc-konut-kredisi-tutar" min="0" step="1000" placeholder="örnek: 2500000" />
        </div>

        <div class="hc-konut-kredisi-grid">
            <div class="hc-form-group">
                <label for="hc-konut-kredisi-vade">Vade (ay)</label>
                <input type="number" id="hc-konut-kredisi-vade" min="1" max="360" step="1" placeholder="örnek: 120" />
            </div>

            <div class="hc-form-group">
                <label for="hc-konut-kredisi-faiz">Aylık Faiz Oranı (%)</label>
                <input type="number" id="hc-konut-kredisi-faiz" min="0" step="0.01" placeholder="örnek: 2.89" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-konut-kredisi-masraf">Başlangıç Masrafları (₺)</label>
            <input type="number" id="hc-konut-kredisi-masraf" min="0" step="100" placeholder="isteğe bağlı" />
        </div>

        <button class="hc-btn" onclick="hcKonutKredisiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-konut-kredisi-result">
            <div class="hc-konut-kredisi-ozet">
                <span>Aylık Taksit</span>
                <strong class="hc-result-value" id="hc-konut-kredisi-aylik-taksit"></strong>
            </div>

            <table class="hc-konut-kredisi-table">
                <tr>
                    <td>Peşinat</td>
                    <td><strong id="hc-konut-kredisi-pesinat"></strong></td>
                </tr>
                <tr>
                    <td>Kredi / konut bedeli oranı</td>
                    <td><strong id="hc-konut-kredisi-oran"></strong></td>
                </tr>
                <tr>
                    <td>Toplam geri ödeme</td>
                    <td><strong id="hc-konut-kredisi-toplam-odeme"></strong></td>
                </tr>
                <tr>
                    <td>Toplam faiz yükü</td>
                    <td><strong id="hc-konut-kredisi-toplam-faiz"></strong></td>
                </tr>
                <tr>
                    <td>Masraflar dahil toplam maliyet</td>
                    <td><strong id="hc-konut-kredisi-toplam-maliyet"></strong></td>
                </tr>
            </table>

            <div class="hc-konut-kredisi-plan">
                <h4>İlk 12 Ay Ödeme Planı</h4>
                <div class="hc-konut-kredisi-plan-wrap">
                    <table class="hc-konut-kredisi-table">
                        <thead>
                            <tr>
                                <th>Ay</th>
                                <th>Taksit</th>
                                <th>Faiz</th>
                                <th>Anapara</th>
                                <th>Kalan Borç</th>
                            </tr>
                        </thead>
                        <tbody id="hc-konut-kredisi-plan-body"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
