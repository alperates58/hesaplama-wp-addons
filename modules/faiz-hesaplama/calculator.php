<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_faiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-faiz-hesaplama',
        HC_PLUGIN_URL . 'modules/faiz-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-faiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/faiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-faiz-hesaplama" id="hc-faiz-hesaplama">
        <h3>Faiz Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-faiz-anapara">Anapara (₺)</label>
            <input type="number" id="hc-faiz-anapara" min="0" step="100" placeholder="₺" />
        </div>

        <div class="hc-faiz-grid">
            <div class="hc-form-group">
                <label for="hc-faiz-oran">Yıllık faiz oranı (%)</label>
                <input type="number" id="hc-faiz-oran" min="0" max="1000" step="0.01" placeholder="%" />
            </div>

            <div class="hc-form-group">
                <label for="hc-faiz-vade">Vade (gün)</label>
                <input type="number" id="hc-faiz-vade" min="1" step="1" placeholder="gün" />
            </div>
        </div>

        <div class="hc-faiz-grid">
            <div class="hc-form-group">
                <label for="hc-faiz-stopaj-tipi">Stopaj</label>
                <select id="hc-faiz-stopaj-tipi" onchange="hcFaizStopajAlaniGuncelle()">
                    <option value="otomatik" selected>TL mevduat vadesine göre otomatik</option>
                    <option value="yok">Stopaj hesaplama</option>
                    <option value="ozel">Özel stopaj oranı</option>
                </select>
            </div>

            <div class="hc-form-group hc-faiz-ozel-stopaj" id="hc-faiz-ozel-stopaj-wrap">
                <label for="hc-faiz-ozel-stopaj">Özel stopaj oranı (%)</label>
                <input type="number" id="hc-faiz-ozel-stopaj" min="0" max="100" step="0.01" placeholder="%" />
            </div>
        </div>

        <button class="hc-btn" onclick="hcFaizHesapla()">Hesapla</button>

        <div class="hc-result hc-faiz-result" id="hc-faiz-result">
            <div class="hc-result-value" id="hc-faiz-net-bakiye"></div>

            <div class="hc-faiz-details">
                <div>
                    <span>Brüt faiz getirisi</span>
                    <strong id="hc-faiz-brut"></strong>
                </div>
                <div>
                    <span>Stopaj kesintisi</span>
                    <strong id="hc-faiz-stopaj"></strong>
                </div>
                <div>
                    <span>Net faiz getirisi</span>
                    <strong id="hc-faiz-net"></strong>
                </div>
                <div>
                    <span>Vade sonu net bakiye</span>
                    <strong id="hc-faiz-bakiye"></strong>
                </div>
            </div>

            <div class="hc-faiz-summary">
                <div>
                    <span>Stopaj oranı</span>
                    <strong id="hc-faiz-stopaj-orani"></strong>
                </div>
                <div>
                    <span>Net efektif yıllık getiri</span>
                    <strong id="hc-faiz-efektif"></strong>
                </div>
            </div>

            <p class="hc-faiz-not" id="hc-faiz-not"></p>
        </div>
    </div>
    <?php
}
