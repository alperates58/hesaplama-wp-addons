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
            <div class="hc-badge">Performance Lab</div>
            <h3>0-100 km/s Tahmini</h3>
            <p>Aracınızın teknik verilerine göre hızlanma potansiyelini analiz edin.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-weight">Araç Ağırlığı (kg)</label>
                <div class="hc-input-wrapper">
                    <input type="number" id="hc-weight" placeholder="Örn: 1450" value="1450">
                    <span class="hc-unit">KG</span>
                </div>
            </div>

            <div class="hc-form-group">
                <label for="hc-hp-val">Beygir Gücü (HP)</label>
                <div class="hc-input-wrapper">
                    <input type="number" id="hc-hp-val" placeholder="Örn: 150" value="150">
                    <span class="hc-unit">HP</span>
                </div>
            </div>

            <div class="hc-form-group full-width">
                <label for="hc-drivetrain">Çekiş Sistemi</label>
                <select id="hc-drivetrain">
                    <option value="1.05">Önden Çekiş (FWD)</option>
                    <option value="0.95">Arkadan İtiş (RWD)</option>
                    <option value="0.85">Dört Tekerden Çekiş (AWD)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hc0100Hesapla()">
            <span>SİMÜLASYONU BAŞLAT</span>
            <div class="hc-btn-glow"></div>
        </button>

        <div class="hc-result" id="hc-0-100-result">
            <div class="hc-res-dashboard">
                <div class="hc-gauge-container">
                    <div class="hc-gauge-bg"></div>
                    <div class="hc-gauge-val" id="hc-res-time">0.0</div>
                    <div class="hc-gauge-label">SANİYE</div>
                </div>
                
                <div class="hc-stats-panel">
                    <div class="hc-stat-card">
                        <span>Güç / Ağırlık</span>
                        <strong id="hc-res-pwr-ratio">-</strong>
                        <small>hp / ton</small>
                    </div>
                    <div class="hc-stat-card">
                        <span>Performans Sınıfı</span>
                        <strong id="hc-res-rank">-</strong>
                    </div>
                </div>
            </div>
            
            <div class="hc-info-disclaimer">
                * Matematiksel modelleme kullanılmıştır. Şanzıman verimliliği, lastik tutunması ve hava sıcaklığı sonuçları ±0.5sn etkileyebilir.
            </div>
        </div>
    </div>
    <?php
}
