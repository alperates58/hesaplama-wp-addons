<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_reaksiyon_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-reaksiyon-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/reaksiyon-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-reaksiyon-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/reaksiyon-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-reaction-time">
        <h3>Reaksiyon Süresi Testi</h3>
        <p style="font-size: 13px; color: var(--hc-front-muted); margin-bottom: 15px;">
            Aşağıdaki kutunun rengi yeşile döndüğünde olabildiğince hızlı tıklayın. Test 3 tur sürecek ve ortalamanızı hesaplayacaktır.
        </p>

        <div class="hc-reaction-box" id="hc-reaction-box" onclick="hcReactionBoxClick()">
            <span id="hc-reaction-text">Başlatmak İçin Tıklayın</span>
        </div>

        <div style="margin-top: 15px; display: flex; justify-content: space-between; font-size: 13px;">
            <div>Tur: <strong id="hc-react-round">0 / 3</strong></div>
            <div>En İyi Skor: <strong id="hc-react-best">-</strong></div>
        </div>

        <div class="hc-result" id="hc-reaksiyon-suresi-result">
            <div class="hc-result-label">Ortalama Reaksiyon Süreniz:</div>
            <div class="hc-result-value" id="hc-react-avg-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <thead>
                        <tr>
                            <th>Tur</th>
                            <th>Reaksiyon Süresi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1. Tur:</td>
                            <td id="hc-react-r1-val">-</td>
                        </tr>
                        <tr>
                            <td>2. Tur:</td>
                            <td id="hc-react-r2-val">-</td>
                        </tr>
                        <tr>
                            <td>3. Tur:</td>
                            <td id="hc-react-r3-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <button class="hc-btn" onclick="hcResetReactionTest()" style="margin-top: 15px;">Testi Sıfırla ve Yeniden Başlat</button>
        </div>
    </div>
    <?php
}
