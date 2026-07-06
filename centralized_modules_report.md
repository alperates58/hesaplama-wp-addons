# Merkezi Yapıya Bağlanan Modüller Raporu (Centralized Modules Report) - Faz 2A

Faz 2A kapsamında modüllerin merkezi registry entegrasyonuna ait istatistikleri ve durum bilgileri aşağıda listelenmiştir.

---

## 📊 Modül Entegrasyon İstatistikleri (Faz 2A)

* **Merkezi Registry Kapsamına Alınan Modül Sayısı:** **91** (Tamamı yüksek/kritik riskli finans, hukuk, sağlık ve mühendislik modülleridir).
* **Canlı Kullanıcı Davranışı Değişen Modül Sayısı:** **0** (Modül kodlarına dokunulmamış, disclaimer gösterimi JSON seviyesinde `disclaimer_type: ""` ile kapatılmıştır).
* **Kategori Düzeltmesi Yapılan Modül Sayısı:** **15** (Analizde yanlış kategoride durduğu tespit edilen 15 modül için registry'de `corrected_category` alanı tanımlanmıştır).
* **Eklenen Veri Kaynağı Sayısı:** **9 adet** (`gib_teblig_2026`, `sgk_genelge_2026`, `tcmb_bddk_faiz`, `mevzuat_kanunlar`, `who_saglik_bakanligi`, `euro_ncap_safety`, `tse_iso_insaat`, `academic_engineering_sources`, `genel_standartlar`).

---

## 🔍 Kategori Düzeltme Listesi

Eski sistemdeki yanlış kategorileri düzeltilerek registry'ye kaydedilen modüller:
1. `uyku-borcu-hesaplama` -> Sağlık & Tıp (Kaynak: `who_saglik_bakanligi`)
2. `kdv-hesaplama-tevkifatli` -> Finans & Ekonomi (Kaynak: `gib_teblig_2026`)
3. `kdv-tevkifat-hesaplama` -> Finans & Ekonomi (Kaynak: `gib_teblig_2026`)
4. `stopaj-hesaplama` -> Finans & Ekonomi (Kaynak: `gib_teblig_2026`)
5. `vergi-sonrasi-borc-maliyeti-hesaplama` -> Finans & Ekonomi (Kaynak: `gib_teblig_2026`)
6. `yillik-izin-ucreti-alacagi-hesaplama` -> Finans & Ekonomi (SGK/İş Hukuku) (Kaynak: `sgk_genelge_2026`)
7. `kimyasal-denklem-dengeleme-hesaplama` -> Bilim & Mühendislik (Kaynak: `academic_engineering_sources`)
8. `kimyasal-oksijen-ihtiyaci-hesaplama` -> Bilim & Mühendislik (Kaynak: `academic_engineering_sources`)
9. `kimyasal-proses-verimi-hesaplama` -> Bilim & Mühendislik (Kaynak: `academic_engineering_sources`)
10. `lbm-hesaplayici` -> Sağlık & Tıp (Kaynak: `who_saglik_bakanligi`)
11. `is-kazasi-tazminat-tahmini-hesaplama` -> Hukuk & Mevzuat (Kaynak: `mevzuat_kanunlar`)
12. `lastik-karsilastirma-hesaplama` -> Otomotiv & Trafik (Kaynak: `euro_ncap_safety`)
13. `zemin-kaplama-metrekare-hesaplama` -> Ev, İnşaat & Bahçe (Kaynak: `tse_iso_insaat`)
14. `kondansator-hesaplama` -> Bilim & Mühendislik (Kaynak: `academic_engineering_sources`)
15. `is-uyumu-hesaplama` -> Diğer / Günlük Yaşam (Kaynak: `genel_standartlar`)

---

## 📋 Registry'ye Kaydedilen Örnek Kritik Modüller (Smoke Test İçin)
Registry doğrulaması yapılan 91 modülden 5 adedinin shortcode render motorunda test edildiği ve sıfır hata ile çalıştığı doğrulanmıştır:
1. **Maaş Hesaplama 2026 (Brüt/Net):** `[hc_maas_hesaplama_2026]`
2. **Yasal Faiz Hesaplama:** `[hc_yasal_faiz_hesaplama]`
3. **KDV Hesaplama (Tevkifatlı):** `[hc_kdv_hesaplama_tevkifatli]`
4. **Uyku Borcu Hesaplama:** `[hc_uyku_borcu_hesaplama]`
5. **Kimyasal Denklem Dengeleme:** `[hc_kimyasal_denklem_dengeleme_hesaplama]`
