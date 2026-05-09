<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_calisma_gunu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-calisma-gunu-hesaplama',
        HC_PLUGIN_URL . 'modules/calisma-gunu-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-calisma-gunu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/calisma-gunu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator hc-calisma-gunu" id="hc-calisma-gunu-hesaplama">
        <h3>Çalışma Günü Hesaplama</h3>
        <p class="hc-calisma-gunu-intro">İki tarih arasındaki çalışma günlerini hesaplayın; hafta sonlarını ve özel tatil günlerini dışarıda bırakın.</p>

        <div class="hc-calisma-gunu-grid">
            <div class="hc-form-group">
                <label for="hc-cgh-baslangic">Başlangıç Tarihi</label>
                <input type="date" id="hc-cgh-baslangic" />
            </div>

            <div class="hc-form-group">
                <label for="hc-cgh-bitis">Bitiş Tarihi</label>
                <input type="date" id="hc-cgh-bitis" />
            </div>
        </div>

        <div class="hc-form-group">
            <label>Çalışma dışı hafta günleri</label>
            <div class="hc-calisma-gunu-days">
                <label><input type="checkbox" class="hc-cgh-hafta-sonu" value="1" /> Pazartesi</label>
                <label><input type="checkbox" class="hc-cgh-hafta-sonu" value="2" /> Salı</label>
                <label><input type="checkbox" class="hc-cgh-hafta-sonu" value="3" /> Çarşamba</label>
                <label><input type="checkbox" class="hc-cgh-hafta-sonu" value="4" /> Perşembe</label>
                <label><input type="checkbox" class="hc-cgh-hafta-sonu" value="5" /> Cuma</label>
                <label><input type="checkbox" class="hc-cgh-hafta-sonu" value="6" checked /> Cumartesi</label>
                <label><input type="checkbox" class="hc-cgh-hafta-sonu" value="0" checked /> Pazar</label>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-cgh-tatiller">Özel tatil günleri (opsiyonel)</label>
            <textarea id="hc-cgh-tatiller" rows="4" placeholder="Her satıra bir tarih yazın: 2026-04-23 veya 23.04.2026"></textarea>
            <small class="hc-calisma-gunu-help">Bu tarihler hafta içine denk gelirse çalışma gününden düşülür.</small>
        </div>

        <button class="hc-btn" onclick="hcCalismaGunuHesapla()">Hesapla</button>

        <div class="hc-result hc-calisma-gunu-result" id="hc-cgh-result">
            <div class="hc-calisma-gunu-hero">
                <div class="hc-calisma-gunu-badge" id="hc-cgh-badge"></div>
                <div>
                    <div class="hc-result-value" id="hc-cgh-calisma"></div>
                    <div class="hc-calisma-gunu-subtitle" id="hc-cgh-ozet"></div>
                </div>
            </div>

            <div class="hc-calisma-gunu-details">
                <div><span>Takvim günü</span><strong id="hc-cgh-takvim"></strong></div>
                <div><span>Çalışma günü</span><strong id="hc-cgh-is"></strong></div>
                <div><span>Çalışma dışı hafta günü</span><strong id="hc-cgh-hafta-sonu"></strong></div>
                <div><span>Özel tatil</span><strong id="hc-cgh-tatil"></strong></div>
                <div><span>Başlangıç günü</span><strong id="hc-cgh-baslangic-gun"></strong></div>
                <div><span>Bitiş günü</span><strong id="hc-cgh-bitis-gun"></strong></div>
            </div>

            <div class="hc-calisma-gunu-list">
                <span>Hariç tutulan özel tarihler</span>
                <ul id="hc-cgh-tatil-listesi"></ul>
            </div>

            <p class="hc-calisma-gunu-yorum" id="hc-cgh-yorum"></p>
        </div>
    </div>
    <?php
}
