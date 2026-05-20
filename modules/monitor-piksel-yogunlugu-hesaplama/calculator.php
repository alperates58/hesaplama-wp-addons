<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_monitor_piksel_yogunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-monitor-piksel-yogunlugu-hesaplama',
        HC_PLUGIN_URL . 'modules/monitor-piksel-yogunlugu-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-monitor-ppi">
        <h3>Monitör Piksel Yoğunluğu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mppi-coz">Ekran Çözünürlüğü</label>
            <select id="hc-mppi-coz" onchange="hcMppiCozDegisti()">
                <option value="1920x1080">Full HD (1920 x 1080)</option>
                <option value="2560x1440" selected>2K QHD (2560 x 1440)</option>
                <option value="3840x2160">4K Ultra HD (3840 x 2160)</option>
                <option value="1280x720">HD (1280 x 720)</option>
                <option value="custom">Özel Çözünürlük...</option>
            </select>
        </div>

        <div id="hc-mppi-custom-coz-gr" style="display: none; background:#f4f7fa; padding:15px; border-radius:8px; margin-bottom:15px;">
            <div class="hc-form-group" style="margin-bottom:8px;">
                <label for="hc-mppi-custom-w">Yatay Piksel Sayısı</label>
                <input type="number" id="hc-mppi-custom-w" min="1" value="2560" />
            </div>
            <div class="hc-form-group" style="margin-bottom:0;">
                <label for="hc-mppi-custom-h">Dikey Piksel Sayısı</label>
                <input type="number" id="hc-mppi-custom-h" min="1" value="1440" />
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-mppi-diagonal">Ekran Köşegen Boyutu (Santimetre - cm)</label>
            <input type="number" id="hc-mppi-diagonal" min="10" step="0.5" value="68.5" />
            <small style="color:#666;font-size:12px;">Örn: ~61 cm (24 inç), ~68.5 cm (27 inç), ~81 cm (32 inç).</small>
        </div>

        <button class="hc-btn" onclick="hcMonitorPikselYogunluguHesapla()">Piksel Yoğunluğunu Hesapla</button>

        <div class="hc-result" id="hc-monitor-ppi-result">
            <table>
                <tr>
                    <td>Toplam Piksel Sayısı</td>
                    <td><strong id="hc-mppi-res-toplam">-</strong></td>
                </tr>
                <tr>
                    <td>Piksel Yoğunluğu (PPI - İnç Başına Piksel)</td>
                    <td><strong class="hc-result-value" id="hc-mppi-res-ppi" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Piksel Yoğunluğu (PPCM - cm Başına Piksel)</td>
                    <td><strong id="hc-mppi-res-ppcm">-</strong></td>
                </tr>
                <tr>
                    <td>Tek Bir Pikselin Boyutu (Nokta Aralığı)</td>
                    <td><strong id="hc-mppi-res-boyut">-</strong></td>
                </tr>
                <tr>
                    <td>Netlik ve Keskinlik Değerlendirmesi</td>
                    <td><strong id="hc-mppi-res-yorum" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
