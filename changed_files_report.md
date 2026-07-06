# Değişen Dosyalar Raporu (Changed Files Report) - Faz 2A

Bu rapor, Faz 2A (Kritik Modüllerin Registry Entegrasyonu) kapsamında yapılan dosya değişikliklerini ve bunların sistem üzerindeki etkilerini belgeler.

---

## 📁 1. Yeni Oluşturulan / Değiştirilen Dosyalar

Faz 2A kapsamında **kesinlikle hiçbir PHP, JS veya CSS kod dosyası değiştirilmemiştir.** Sadece aşağıdaki iki veri dosyası güncellenmiştir:

* **[module-registry.json](file:///c:/Users/alper.ates.LIDER/Desktop/hesaplama-wp-addons/assets/data/module-registry.json):** 91 adet yüksek/kritik riskli modülün kayıt bilgileri, kategorileri, öncelikleri, kaynak atamaları ve disclaimer durumları eklenmiştir.
* **[source-registry.json](file:///c:/Users/alper.ates.LIDER/Desktop/hesaplama-wp-addons/assets/data/source-registry.json):** Yasal ve akademik denetimler için `academic_engineering_sources` (Akademik Mühendislik Kaynakları) anahtarı dahil 9 adet veri kaynağı tanımlanmıştır.

---

## 📊 2. Sistem Etki Analizi

| Sistem Bileşeni | Değişiklik Durumu | Etki Derecesi | Açıklama / Garanti |
| :--- | :---: | :---: | :--- |
| **WordPress Dashboard** | Değişmedi | **Sıfır Etki** | Dashboard dosyaları ve PHP sınıfları tamamen orijinal durumundadır. |
| **GitHub Update Motoru** | Değişmedi | **Sıfır Etki** | Update kodlarına (`class-github-updater.php`) dokunulmamıştır. |
| **Shortcode / Modül Yükleme** | Değişmedi | **Sıfır Etki** | Shortcode kayıt ve glob tarama sistemi geriye uyumlulukla sorunsuz çalışır. |
| **Modül Kodları (PHP/JS)** | Değişmedi | **Sıfır Etki** | 2.939 modülün hiçbir calculator.js veya php dosyasına müdahale edilmemiştir. |
| **Kullanıcı Çıktı Ekranları** | Değişmedi | **Sıfır Etki** | `disclaimer_type: ""` ve `disclaimer_enabled: false` ayarları sayesinde canlı kullanıcılara disclaimer kutuları basılması 100% engellenmiştir. |
