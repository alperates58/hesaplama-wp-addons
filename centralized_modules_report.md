# Merkezi Yapıya Bağlanan Modüller Raporu (Centralized Modules Report)

Faz 1 kapsamında modüllerin merkezi yapıya uyumluluk ve geçiş istatistikleri aşağıda detaylandırılmıştır.

---

## 📊 Modül Geçiş İstatistikleri (Faz 1)

| Geçiş Durumu | Modül Sayısı | Açıklama |
| :--- | :---: | :--- |
| **Merkezi Yapıya Bağlanan (Katsayıları Taşınan)** | **0** | Faz 1 yasakları doğrultusunda hiçbir modülün katsayısı koda gömülü halden ayrıştırılmamıştır. |
| **Sadece Registry'ye Kaydedilen** | **1** | Test amacıyla `ask-uyumu` modülü registry'ye eklenmiş ve geriye uyumluluk test edilmiştir. |
| **Formülü Değişen Modüller** | **0** | Hiçbir formül veya katsayı mantığı değiştirilmemiştir. |
| **Sonucu Değişen Modüller** | **0** | Kullanıcı çıktı ekranlarında hiçbir değişiklik yapılmamıştır. |
| **Otomatik Disclaimer Eklenen Modüller** | **0** | Altyapı testi hariç, canlı modüllerin hiçbirine disclaimer basılmamıştır. |
| **Hiç Dokunulmayan / Fallback ile Çalışan Modüller** | **2.939** | Geri kalan tüm modüller eski glob tespiti ve dosya yükleme mekanizmasıyla sorunsuz çalışmaya devam etmektedir. |

---

## 🔍 Detaylı Kırılım Listesi

### A) Merkezi Yapıya Bağlanan Modüller Listesi
* *Faz 1 kapsamında merkezi yapıya bağlanan (kodu değiştirilen) modül bulunmamaktadır.*

### B) Davranışı Değişen Modüller Listesi
* *Faz 1 kapsamında davranışı, girdisi veya çıktısı değişen hiçbir modül bulunmamaktadır.*

### C) Hiç Dokunulmayan Modüller Listesi
* `modules/` dizini altındaki tüm **2.939** modül (altyapı testi hariç) tamamen orijinal kodlarıyla çalışmaktadır.

### D) Kontrol Edilmesi Önerilen Örnek Modüller Listesi (Smoke Test)
Mevcut fallback ve yeni registry sisteminin bir arada çalıştığını test etmek için aşağıdaki 10 modülün front-end sayfalarının kontrol edilmesi önerilir:
1. **Burç & numeroloji aşk uyumu** (`[hc_ask_uyumu]` - Registry'de kayıtlı test modülü)
2. **Kredi Kartı Asgari Ödeme** (`[hc_kredi_karti_asgari_odeme]` - Eski modül, registry dışı fallback)
3. **Maksimum Nabız Hesaplama** (`[hc_maksimum_nabiz_hesaplama]` - Eski modül, registry dışı fallback)
4. **REM Uyku Süresi** (`[hc_rem_uyku_suresi_hesaplama]` - Eski modül, registry dışı fallback)
5. **Rapor Parası Hesaplama** (`[hc_rapor_parasi_hesaplama]` - Eski modül, registry dışı fallback)
6. **Damga Vergisi Hesaplama** (`[hc_damga_vergisi_hesaplama]` - Eski modül, registry dışı fallback)
7. **Yasal Faiz Hesaplama** (`[hc_yasal_faiz_hesaplama]` - Eski modül, registry dışı fallback)
8. **Kıdem Tazminatı Hesaplama** (`[hc_kidem_tazminati_hesaplama]` - Eski modül, registry dışı fallback)
9. **Tüketici Mahkemesi Sınırı** (`[hc_tuketici_mahkemesi_siniri]` - Eski modül, registry dışı fallback)
10. **Lastik Ölçüsü Karşılaştırma** (`[hc_lastik_karsilastirma_hesaplama]` - Eski modül, registry dışı fallback)
