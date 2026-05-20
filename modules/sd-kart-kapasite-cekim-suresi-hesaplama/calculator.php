<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sd_kart_kapasite_cekim_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sd-kart-kapasite-cekim-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/sd-kart-kapasite-cekim-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sd-kart-kapasite-cekim-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sd-kart-kapasite-cekim-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sd-kart-kapasite-cekim-suresi-hesaplama">
        <h3>SD Kart Kapasite Çekim Süresi Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-sd-capacity">SD Kart Kapasitesi</label>
            <select id="hc-sd-capacity" class="hc-select">
                <option value="32">32 GB</option>
                <option value="64" selected>64 GB</option>
                <option value="128">128 GB</option>
                <option value="256">256 GB</option>
                <option value="512">512 GB</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sd-mode">Cekim Türü</label>
            <select id="hc-sd-mode" class="hc-select" onchange="hcSdModDegis()">
                <option value="video" selected>Video</option>
                <option value="photo">Fotoğraf</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-sd-video-group">
            <label for="hc-sd-video-bitrate">Video Bitrate (Mbps)</label>
            <select id="hc-sd-video-bitrate" class="hc-select">
                <option value="25">25 Mbps (1080p)</option>
                <option value="50" selected>50 Mbps (1080p Pro)</option>
                <option value="100">100 Mbps (4K)</option>
                <option value="200">200 Mbps (4K Pro)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-sd-photo-group" style="display: none;">
            <label for="hc-sd-photo-size">Ortalama Fotoğraf Boyutu (MB)</label>
            <input type="number" id="hc-sd-photo-size" class="hc-input" placeholder="Örn: 3.5" value="3.5" min="0.1" step="0.1">
        </div>

        <button class="hc-btn" onclick="hcSdKartKapasineCekimSuresiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sd-kart-kapasite-cekim-suresi-hesaplama-result">
            <div class="hc-result-item">
                <span id="hc-sd-result-label">Maksimum Video Süresi:</span>
                <strong id="hc-sd-result-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kullanılabilir Alan (~95%):</span>
                <strong id="hc-sd-usable-space-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tavsiye:</span>
                <strong id="hc-sd-recommendation-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
