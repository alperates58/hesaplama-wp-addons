<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_takipci_artis_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-takipci-artis-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/takipci-artis-hizi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-takipci-artis">
        <h3>Takipçi Artış Hızı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-tah-baslangic">Dönem Başı Takipçi Sayısı</label>
            <input type="number" id="hc-tah-baslangic" min="1" placeholder="örn: 8500" />
        </div>

        <div class="hc-form-group">
            <label for="hc-tah-kazanilan">Dönem İçinde Kazanılan Yeni Takipçi</label>
            <input type="number" id="hc-tah-kazanilan" min="0" placeholder="örn: 1200" />
        </div>

        <div class="hc-form-group">
            <label for="hc-tah-kaybedilen">Dönem İçinde Takipten Çıkan (Kayıp)</label>
            <input type="number" id="hc-tah-kaybedilen" min="0" placeholder="örn: 350" />
        </div>

        <div class="hc-form-group">
            <label for="hc-tah-gun">Dönem Süresi (Gün)</label>
            <input type="number" id="hc-tah-gun" min="1" value="30" />
        </div>

        <button class="hc-btn" onclick="hcTakipciArtisHiziHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-takipci-artis-result">
            <table>
                <tr>
                    <td>Net Takipçi Artışı</td>
                    <td><strong id="hc-tah-res-net">-</strong></td>
                </tr>
                <tr>
                    <td>Günlük Ortalama Net Artış</td>
                    <td><strong id="hc-tah-res-gunluk">-</strong></td>
                </tr>
                <tr>
                    <td>Takipçi Kayıp Oranı (Churn Rate)</td>
                    <td><strong id="hc-tah-res-kayip" style="color: var(--hc-front-red);">-</strong></td>
                </tr>
                <tr>
                    <td>Günlük Net Artış Hızı (%)</td>
                    <td><strong class="hc-result-value" id="hc-tah-res-hiz" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
