<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ihtiyac_kredisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ihtiyac-kredisi-hesaplama',
        HC_PLUGIN_URL . 'modules/ihtiyac-kredisi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-ihtiyac-kredisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ihtiyac-kredisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-ihtiyac-kredisi-hesaplama" id="hc-ihtiyac-kredisi-hesaplama">
        <h3>İhtiyaç Kredisi Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-ihtiyac-tutar">Kredi tutarı (₺)</label>
            <input type="number" id="hc-ihtiyac-tutar" min="0" step="1000" placeholder="₺" />
        </div>

        <div class="hc-ihtiyac-grid">
            <div class="hc-form-group">
                <label for="hc-ihtiyac-faiz">Aylık akdi faiz oranı (%)</label>
                <input type="number" id="hc-ihtiyac-faiz" min="0" max="100" step="0.01" placeholder="%" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ihtiyac-vade">Vade (ay)</label>
                <input type="number" id="hc-ihtiyac-vade" min="1" max="120" step="1" placeholder="ay" />
            </div>
        </div>

        <div class="hc-ihtiyac-grid">
            <div class="hc-form-group">
                <label for="hc-ihtiyac-tahsis">Kredi tahsis ücreti oranı (%)</label>
                <input type="number" id="hc-ihtiyac-tahsis" min="0" max="5" step="0.01" value="0.5" placeholder="%" />
            </div>

            <div class="hc-form-group">
                <label for="hc-ihtiyac-sigorta">Sigorta ve diğer masraflar (₺)</label>
                <input type="number" id="hc-ihtiyac-sigorta" min="0" step="100" value="0" placeholder="₺" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcIhtiyacKredisiHesapla()">Hesapla</button>

        <div class="hc-result hc-ihtiyac-result" id="hc-ihtiyac-result">
            <div class="hc-result-value" id="hc-ihtiyac-taksit"></div>

            <div class="hc-ihtiyac-details">
                <div>
                    <span>Aylık taksit</span>
                    <strong id="hc-ihtiyac-aylik-taksit"></strong>
                </div>
                <div>
                    <span>Toplam geri ödeme</span>
                    <strong id="hc-ihtiyac-toplam-odeme"></strong>
                </div>
                <div>
                    <span>Toplam faiz</span>
                    <strong id="hc-ihtiyac-toplam-faiz"></strong>
                </div>
                <div>
                    <span>Toplam vergi</span>
                    <strong id="hc-ihtiyac-toplam-vergi"></strong>
                </div>
                <div>
                    <span>Peşin masraflar</span>
                    <strong id="hc-ihtiyac-pesin-masraf"></strong>
                </div>
                <div>
                    <span>Ele geçen yaklaşık tutar</span>
                    <strong id="hc-ihtiyac-net-tutar"></strong>
                </div>
            </div>

            <div class="hc-ihtiyac-summary">
                <div>
                    <span>Efektif aylık oran</span>
                    <strong id="hc-ihtiyac-efektif-aylik"></strong>
                </div>
                <div>
                    <span>Efektif yıllık oran</span>
                    <strong id="hc-ihtiyac-efektif-yillik"></strong>
                </div>
                <div>
                    <span>KKDF + BSMV</span>
                    <strong>%15 + %15</strong>
                </div>
            </div>

            <div class="hc-ihtiyac-table-wrap">
                <table class="hc-ihtiyac-table">
                    <thead>
                        <tr>
                            <th>Ay</th>
                            <th>Taksit</th>
                            <th>Anapara</th>
                            <th>Faiz</th>
                            <th>KKDF</th>
                            <th>BSMV</th>
                            <th>Kalan borç</th>
                        </tr>
                    </thead>
                    <tbody id="hc-ihtiyac-tbody"></tbody>
                </table>
            </div>

            <p class="hc-ihtiyac-not" id="hc-ihtiyac-not"></p>
        </div>
    </div>
    <?php
}
