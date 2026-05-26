<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dovus_sporu_reaksiyon_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-react-game',
        HC_PLUGIN_URL . 'modules/dovus-sporu-reaksiyon-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-react-game-css',
        HC_PLUGIN_URL . 'modules/dovus-sporu-reaksiyon-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dovus-sporu-reaksiyon-suresi-hesaplama">
        <h3>Dövüş Sporu Reaksiyon Süresi Ölçümü</h3>
        <p style="font-size:13px; color:#666;">Kafesteki veya ringdeki refleklerinizi test edin. Butona tıklayın, alan yeşile döndüğü an en hızlı şekilde tıklayın.</p>
        
        <div id="hc-dsr-game-box" style="width:100%; height:200px; background:#ef4444; border-radius:12px; display:flex; align-items:center; justify-content:center; color:#fff; font-size:24px; font-weight:bold; cursor:pointer; user-select:none; margin-bottom:20px; transition: background 0.1s ease;" onclick="hcDsrClickGameBox()">
            BAŞLAMAK İÇİN TIKLA
        </div>
        
        <div class="hc-result" id="hc-dsr-result">
            <h4>Reaksiyon Hız Analiz Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Son Tıklama Süresi</td>
                        <td id="hc-dsr-res-last">0 ms</td>
                    </tr>
                    <tr>
                        <td>Deneme Geçmişi</td>
                        <td id="hc-dsr-res-history">-</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Ortalama Reaksiyon Süresi</td>
                        <td id="hc-dsr-res-avg">0 ms</td>
                    </tr>
                    <tr>
                        <td>Refleks Seviyesi Değerlendirmesi</td>
                        <td id="hc-dsr-res-rating" style="font-weight:bold;">-</td>
                    </tr>
                </tbody>
            </table>
            <button class="hc-btn" onclick="hcDsrResetGame()">Testi Yeniden Başlat</button>
        </div>
    </div>
    <?php
}