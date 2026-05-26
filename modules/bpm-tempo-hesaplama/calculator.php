<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bpm_tempo_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bpm-tempo',
        HC_PLUGIN_URL . 'modules/bpm-tempo-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bpm-tempo-css',
        HC_PLUGIN_URL . 'modules/bpm-tempo-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bpm-tempo-hesaplama">
        <h3>BPM Tempo Hesaplama</h3>
        
        <!-- Ritme Tıklama Butonu -->
        <div class="hc-form-group" style="text-align:center;">
            <label>Ritme Uyumlu Olarak Aşağıdaki Butona Tıklayın</label>
            <button id="hc-bpm-tap-btn" class="hc-btn" style="background:#3b82f6; height:120px; font-size:24px; font-weight:700; border-radius:50%; width:120px; margin: 20px auto; display:block;" onclick="hcBpmTap()">TAP</button>
            <span id="hc-bpm-sayac" style="font-size:12px; color:#64748b;">En az 4 kez tıklayın.</span>
        </div>

        <div style="text-align:center; margin-bottom:16px;">
            <span style="color:#64748b; font-size:13px;">- VEYA MANUEL HESAPLAYIN -</span>
        </div>

        <div class="hc-form-group">
            <label for="hc-bpm-vurus">Toplam Vuruş Sayısı</label>
            <input type="number" id="hc-bpm-vurus" placeholder="Örn: 20" min="1" value="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-bpm-sure">Geçen Süre (Saniye)</label>
            <input type="number" id="hc-bpm-sure" placeholder="Örn: 10" step="any" min="0.1" value="10">
        </div>
        <button class="hc-btn" onclick="hcBpmManuelHesapla()">Manuel Hesapla</button>
        
        <div class="hc-result" id="hc-bpm-result">
            <h4>BPM Analizi Sonuçları:</h4>
            <table>
                <tbody>
                    <tr style="font-size:20px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Hesaplanan Tempo (BPM)</td>
                        <td id="hc-bpm-res-bpm">0 BPM</td>
                    </tr>
                    <tr>
                        <td>Tempo Terimi (Müzikal Klasman)</td>
                        <td id="hc-bpm-res-terim" style="font-weight:bold;">Moderato</td>
                    </tr>
                    <tr style="font-size:13px; color:#64748b;">
                        <td>Vuruş Başına Süre (ms)</td>
                        <td id="hc-bpm-res-ms">0 ms</td>
                    </tr>
                </tbody>
            </table>
            <button class="hc-btn" style="background:#64748b; margin-top:12px;" onclick="hcBpmSifirla()">Sayaçları Sıfırla</button>
        </div>
    </div>
    <?php
}