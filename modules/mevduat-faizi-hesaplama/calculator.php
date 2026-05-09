<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mevduat_faizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mevduat-faizi-hesaplama',
        HC_PLUGIN_URL . 'modules/mevduat-faizi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-mevduat-faizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mevduat-faizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-mevduat-faizi-hesaplama" id="hc-mevduat-faizi-hesaplama">
        <h3>Mevduat Faizi Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-mevduat-anapara">Mevduat tutarı (₺)</label>
            <input type="number" id="hc-mevduat-anapara" min="0" step="1000" placeholder="₺" />
        </div>

        <div class="hc-mevduat-grid">
            <div class="hc-form-group">
                <label for="hc-mevduat-faiz">Yıllık brüt faiz oranı (%)</label>
                <input type="number" id="hc-mevduat-faiz" min="0" max="1000" step="0.01" placeholder="%" />
            </div>

            <div class="hc-form-group">
                <label for="hc-mevduat-vade">Vade (gün)</label>
                <input type="number" id="hc-mevduat-vade" min="1" step="1" value="32" placeholder="gün" />
            </div>
        </div>

        <div class="hc-mevduat-grid">
            <div class="hc-form-group">
                <label for="hc-mevduat-stopaj-tipi">Stopaj</label>
                <select id="hc-mevduat-stopaj-tipi" onchange="hcMevduatStopajAlaniGuncelle()">
                    <option value="otomatik" selected>TL mevduat vadesine göre otomatik</option>
                    <option value="yok">Stopaj hesaplama</option>
                    <option value="ozel">Özel stopaj oranı</option>
                </select>
            </div>

            <div class="hc-form-group hc-mevduat-ozel-stopaj" id="hc-mevduat-ozel-stopaj-wrap">
                <label for="hc-mevduat-ozel-stopaj">Özel stopaj oranı (%)</label>
                <input type="number" id="hc-mevduat-ozel-stopaj" min="0" max="100" step="0.01" placeholder="%" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-mevduat-yenileme">Vade yenileme sayısı</label>
            <input type="number" id="hc-mevduat-yenileme" min="1" step="1" value="1" placeholder="adet" />
        </div>

        <button class="hc-btn" onclick="hcMevduatFaiziHesapla()">Hesapla</button>

        <div class="hc-result hc-mevduat-result" id="hc-mevduat-result">
            <div class="hc-result-value" id="hc-mevduat-net-bakiye"></div>

            <div class="hc-mevduat-details">
                <div>
                    <span>Brüt faiz</span>
                    <strong id="hc-mevduat-brut"></strong>
                </div>
                <div>
                    <span>Stopaj kesintisi</span>
                    <strong id="hc-mevduat-stopaj"></strong>
                </div>
                <div>
                    <span>Net faiz</span>
                    <strong id="hc-mevduat-net-faiz"></strong>
                </div>
                <div>
                    <span>Vade sonu net bakiye</span>
                    <strong id="hc-mevduat-bakiye"></strong>
                </div>
            </div>

            <div class="hc-mevduat-summary">
                <div>
                    <span>Stopaj oranı</span>
                    <strong id="hc-mevduat-stopaj-orani"></strong>
                </div>
                <div>
                    <span>Net dönemsel getiri</span>
                    <strong id="hc-mevduat-donemsel"></strong>
                </div>
                <div>
                    <span>Net efektif yıllık getiri</span>
                    <strong id="hc-mevduat-efektif"></strong>
                </div>
            </div>

            <p class="hc-mevduat-not" id="hc-mevduat-not"></p>
        </div>
    </div>
    <?php
}
