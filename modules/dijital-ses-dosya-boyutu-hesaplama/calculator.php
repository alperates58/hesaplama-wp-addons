<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dijital_ses_dosya_boyutu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-audio-size',
        HC_PLUGIN_URL . 'modules/dijital-ses-dosya-boyutu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-audio-size-css',
        HC_PLUGIN_URL . 'modules/dijital-ses-dosya-boyutu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dijital-ses-dosya-boyutu-hesaplama">
        <h3>Dijital Ses Dosya Boyutu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Ses Süresi</label>
            <div style="display:flex; gap:8px;">
                <input type="number" id="hc-dsd-saat" placeholder="Saat" min="0" value="0" style="flex:1;">
                <input type="number" id="hc-dsd-dakika" placeholder="Dakika" min="0" max="59" value="3" style="flex:1;">
                <input type="number" id="hc-dsd-saniye" placeholder="Saniye" min="0" max="59" value="30" style="flex:1;">
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-dsd-format">Format / Sıkıştırma Tipi</label>
            <select id="hc-dsd-format" onchange="hcSesFormatDegisti()">
                <option value="wav">Sıkıştırılmamış (WAV, AIFF, PCM)</option>
                <option value="mp3">Sıkıştırılmış MP3 / AAC</option>
            </select>
        </div>

        <!-- Sıkıştırılmamış Alanlar -->
        <div id="hc-dsd-wav-fields">
            <div class="hc-form-group">
                <label for="hc-dsd-sample">Örnekleme Hızı (Sample Rate)</label>
                <select id="hc-dsd-sample">
                    <option value="44100" selected>44.1 kHz (CD Kalitesi)</option>
                    <option value="48000">48.0 kHz (Video/Film Standardı)</option>
                    <option value="96000">96.0 kHz (Stüdyo / Hi-Res)</option>
                    <option value="192000">192.0 kHz (Profesyonel Mastering)</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-dsd-bit">Bit Derinliği (Bit Depth)</label>
                <select id="hc-dsd-bit">
                    <option value="16" selected>16-bit (Standart CD)</option>
                    <option value="24">24-bit (Yüksek Çözünürlük)</option>
                    <option value="32">32-bit Float (Mastering / Professional)</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-dsd-kanallar">Ses Kanalları (Channels)</label>
                <select id="hc-dsd-kanallar">
                    <option value="1">Mono (Tek Kanal)</option>
                    <option value="2" selected>Stereo (Çift Kanal)</option>
                    <option value="6">5.1 Surround (6 Kanal)</option>
                </select>
            </div>
        </div>

        <!-- Sıkıştırılmış Alanlar -->
        <div id="hc-dsd-mp3-fields" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-dsd-bitrate">Bit Hızı (Bitrate - kbps)</label>
                <select id="hc-dsd-bitrate">
                    <option value="128">128 kbps (Standart Mobil Akış)</option>
                    <option value="192">192 kbps (Orta Kalite)</option>
                    <option value="320" selected>320 kbps (En Yüksek MP3 Kalitesi)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcSesBoyutuHesapla()">Dosya Boyutunu Hesapla</button>
        
        <div class="hc-result" id="hc-dsd-result">
            <h4>Dosya Boyutu Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Süre (Saniye)</td>
                        <td id="hc-dsd-res-sure">0 Saniye</td>
                    </tr>
                    <tr>
                        <td>Ses Bit Hızı (Bitrate)</td>
                        <td id="hc-dsd-res-bitrate">0 kbps</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Dosya Boyutu</td>
                        <td id="hc-dsd-res-boyut">0.00 MB</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}