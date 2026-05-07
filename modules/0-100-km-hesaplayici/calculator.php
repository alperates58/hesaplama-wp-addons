<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_0_100_km_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-0-100-km-hesaplayici',
        HC_PLUGIN_URL . 'modules/0-100-km-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-0-100-km-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/0-100-km-hesaplayici/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-0-100-km-hesaplayici">
        <div class="hc-header">
            <h3>0-100 Km/s Hızlanma Hesaplayıcı</h3>
            <p>Aracınızın teknik özelliklerine göre tahmini hızlanma performansını ölçün.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-weight">Araç Ağırlığı (kg)</label>
                <input type="number" id="hc-weight" placeholder="Örn: 1450" value="1450">
            </div>

            <div class="hc-form-group">
                <label for="hc-hp-val">Beygir Gücü (HP)</label>
                <input type="number" id="hc-hp-val" placeholder="Örn: 150" value="150">
            </div>

            <div class="hc-form-group full-width">
                <label for="hc-drivetrain">Çekiş Tipi</label>
                <select id="hc-drivetrain">
                    <option value="1.05">Önden Çekiş (FWD)</option>
                    <option value="0.95">Arkadan İtiş (RWD)</option>
                    <option value="0.85">Dört Tekerden Çekiş (AWD)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hc0100Hesapla()">Hızlanmayı Hesapla</button>

        <div class="hc-result" id="hc-0-100-result">
            <div class="hc-result-header">Tahmini Hızlanma Süresi</div>
            <div class="hc-main-res">
                <strong id="hc-res-time">-</strong>
                <span>Saniye</span>
            </div>
            
            <div class="hc-performance-rank">
                <span id="hc-res-rank">-</span>
            </div>
            
            <div class="hc-info-note">
                * Bu değer matematiksel bir tahmindir; şanzıman tipi, lastik durumu ve hava koşullarına göre değişkenlik gösterebilir.
            </div>
        </div>
    </div>
    <?php
}
