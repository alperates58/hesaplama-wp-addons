<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karbon_ayak_izi( $atts ) {
    wp_enqueue_script(
        'hc-karbon-ayak-izi',
        HC_PLUGIN_URL . 'modules/karbon-ayak-izi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-karbon-ayak-izi-css',
        HC_PLUGIN_URL . 'modules/karbon-ayak-izi/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-karbon-ayak-izi">
        <div class="hc-header">
            <h3>Karbon Ayak İzi Hesaplayıcı</h3>
            <p>Yıllık ekolojik etkinizi ölçün ve nasıl azaltabileceğinizi öğrenin.</p>
        </div>
        
        <div class="hc-eco-tabs">
            <button class="hc-eco-tab active" onclick="hcSwitchEcoTab(this, 'home')">Ev Enerjisi</button>
            <button class="hc-eco-tab" onclick="hcSwitchEcoTab(this, 'travel')">Ulaşım</button>
            <button class="hc-eco-tab" onclick="hcSwitchEcoTab(this, 'lifestyle')">Yaşam</button>
        </div>

        <div id="hc-eco-home" class="hc-eco-panel active">
            <div class="hc-form-group">
                <label>Aylık Elektrik Tüketimi (kWh)</label>
                <input type="number" id="hc-eco-elec" placeholder="Örn: 250" step="1">
            </div>
            <div class="hc-form-group">
                <label>Aylık Doğalgaz Tüketimi (m³)</label>
                <input type="number" id="hc-eco-gas" placeholder="Örn: 100" step="1">
            </div>
        </div>

        <div id="hc-eco-travel" class="hc-eco-panel">
            <div class="hc-form-group">
                <label>Aylık Yakıt Tüketimi (Litre)</label>
                <input type="number" id="hc-eco-fuel" placeholder="Benzin veya Dizel" step="1">
            </div>
            <div class="hc-form-group">
                <label>Yıllık Uçuş Süresi (Saat)</label>
                <input type="number" id="hc-eco-flight" placeholder="Toplam uçuş saati" step="1">
            </div>
        </div>

        <div id="hc-eco-lifestyle" class="hc-eco-panel">
            <div class="hc-form-group">
                <label>Beslenme Alışkanlığı</label>
                <select id="hc-eco-diet">
                    <option value="heavy">Et Ağırlıklı (Her gün et)</option>
                    <option value="medium" selected>Dengeli (Haftada 2-3 gün et)</option>
                    <option value="low">Az Et (Nadiren et)</option>
                    <option value="veg">Vejetaryen / Vegan</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcEcoHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-eco-result">
            <div class="hc-res-circle">
                <div class="hc-res-label">YILLIK EMİSYON</div>
                <div class="hc-res-main"><span id="hc-res-co2-val">0</span> <small>Ton CO₂</small></div>
            </div>
            <div class="hc-eco-offset">
                <div class="hc-tree-box">
                    <span class="hc-tree-icon">🌳</span>
                    <div>
                        <p>Bu emisyonu dengelemek için yılda</p>
                        <strong id="hc-res-trees">0</strong>
                        <p>ağaç dikmelisiniz.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
