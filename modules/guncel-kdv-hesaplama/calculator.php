<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guncel_kdv_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-guncel-kdv-hesaplama',
        HC_PLUGIN_URL . 'modules/guncel-kdv-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-guncel-kdv-hesaplama-css',
        HC_PLUGIN_URL . 'modules/guncel-kdv-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-guncel-kdv-hesaplama" id="hc-guncel-kdv-hesaplama">
        <h3>Güncel KDV Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-kdv-islem">Hesaplama türü</label>
            <select id="hc-kdv-islem">
                <option value="haricten-dahile">KDV hariç tutardan KDV dahil tutara</option>
                <option value="dahilden-harice">KDV dahil tutardan KDV hariç tutara</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-kdv-tutar">Tutar (₺)</label>
            <input type="number" id="hc-kdv-tutar" min="0" step="0.01" placeholder="₺" />
        </div>

        <div class="hc-guncel-kdv-grid">
            <div class="hc-form-group">
                <label for="hc-kdv-oran">KDV oranı</label>
                <select id="hc-kdv-oran" onchange="hcGuncelKdvOzelOranGuncelle()">
                    <option value="20" selected>%20 - Genel oran</option>
                    <option value="10">%10 - İndirimli oran</option>
                    <option value="1">%1 - Düşük oran</option>
                    <option value="ozel">Özel oran</option>
                </select>
            </div>

            <div class="hc-form-group hc-guncel-kdv-ozel-wrap" id="hc-kdv-ozel-wrap">
                <label for="hc-kdv-ozel-oran">Özel KDV oranı (%)</label>
                <input type="number" id="hc-kdv-ozel-oran" min="0" max="100" step="0.01" placeholder="%" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcGuncelKdvHesapla()">Hesapla</button>

        <div class="hc-result hc-guncel-kdv-result" id="hc-kdv-result">
            <div class="hc-result-value" id="hc-kdv-ana-sonuc"></div>

            <div class="hc-guncel-kdv-details">
                <div>
                    <span>KDV hariç tutar</span>
                    <strong id="hc-kdv-haric"></strong>
                </div>
                <div>
                    <span>KDV tutarı</span>
                    <strong id="hc-kdv-tutari"></strong>
                </div>
                <div>
                    <span>KDV dahil tutar</span>
                    <strong id="hc-kdv-dahil"></strong>
                </div>
                <div>
                    <span>Uygulanan oran</span>
                    <strong id="hc-kdv-uygulanan-oran"></strong>
                </div>
            </div>

            <p class="hc-guncel-kdv-not" id="hc-kdv-not"></p>
        </div>
    </div>
    <?php
}
