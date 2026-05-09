<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_issizlik_maasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-issizlik-maasi-hesaplama',
        HC_PLUGIN_URL . 'modules/issizlik-maasi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-issizlik-maasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/issizlik-maasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-issizlik-maasi-hesaplama">
        <h3>İşsizlik Maaşı Hesaplama</h3>

        <div class="hc-issizlik-maasi-hesaplama-grid">
            <div class="hc-form-group">
                <label for="hc-issizlik-kod">SGK İşten Ayrılış Kodu</label>
                <select id="hc-issizlik-kod">
                    <option value="">Lütfen çıkış kodunuzu seçiniz</option>
                    <option value="04">Kod 04: İşveren tarafından fesih</option>
                    <option value="05">Kod 05: Belirli süreli sözleşmenin sona ermesi</option>
                    <option value="15">Kod 15: Toplu işçi çıkarma</option>
                    <option value="17">Kod 17: İşyerinin kapanması</option>
                    <option value="18">Kod 18: İşin sona ermesi</option>
                    <option value="23">Kod 23: İşçi tarafından zorunlu nedenle fesih</option>
                    <option value="24">Kod 24: İşçi tarafından sağlık nedeniyle fesih</option>
                    <option value="25">Kod 25: İşçinin haklı nedenle feshi</option>
                    <option value="27">Kod 27: İşveren tarafından zorunlu nedenlerle fesih</option>
                    <option value="03">Kod 03: İstifa</option>
                    <option value="22">Kod 22: Diğer nedenler</option>
                    <option value="29">Kod 29/42-50: Ahlak ve iyi niyet kurallarına aykırılık</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-issizlik-prim">Son 3 Yıldaki Prim Günü</label>
                <select id="hc-issizlik-prim">
                    <option value="">Prim gününüzü seçiniz</option>
                    <option value="0">600 günden az</option>
                    <option value="6">600 - 899 gün arası</option>
                    <option value="8">900 - 1079 gün arası</option>
                    <option value="10">1080 gün ve üzeri</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-issizlik-emekli">Emekli Çalışan mısınız?</label>
                <select id="hc-issizlik-emekli">
                    <option value="hayir">Hayır, normal çalışanım</option>
                    <option value="evet">Evet, emekliyim (SGDP)</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-issizlik-son120">Son 120 Gün Şartı</label>
                <select id="hc-issizlik-son120">
                    <option value="evet">Sağlıyorum</option>
                    <option value="hayir">Sağlamıyorum</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-issizlik-brut">Son 4 Aylık Toplam Brüt Kazanç (TL)</label>
            <input type="text" inputmode="decimal" id="hc-issizlik-brut" placeholder="Örn: 132.120 TL" autocomplete="off" />
            <small class="hc-issizlik-maasi-hesaplama-help">Prime esas brüt kazanca prim, ikramiye ve yol/yemek gibi ödemeler dahil edilebilir.</small>
        </div>

        <button class="hc-btn" onclick="hcIssizlikMaasiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-issizlik-maasi-hesaplama-result">
            <div class="hc-issizlik-maasi-hesaplama-status" id="hc-issizlik-durum"></div>
            <div class="hc-result-value" id="hc-issizlik-net">-- TL</div>

            <div class="hc-issizlik-maasi-hesaplama-results">
                <div>
                    <span>Hak Edilen Süre</span>
                    <strong id="hc-issizlik-sure">-- ay</strong>
                </div>
                <div>
                    <span>Hesaplanan Aylık Brüt</span>
                    <strong id="hc-issizlik-aylik-brut">-- TL</strong>
                </div>
                <div>
                    <span>Damga Vergisi Kesintisi</span>
                    <strong id="hc-issizlik-damga">-- TL</strong>
                </div>
                <div>
                    <span>Toplam Alınacak Tutar</span>
                    <strong id="hc-issizlik-toplam">-- TL</strong>
                </div>
            </div>

            <p class="hc-issizlik-maasi-hesaplama-note" id="hc-issizlik-not"></p>
        </div>
    </div>
    <?php
}
