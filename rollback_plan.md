# Geri Dönüş Planı (Rollback Plan) - Faz 2A

Faz 2A güncellemeleri sırasında (örneğin JSON okuma hatası veya site hızında yavaşlama vb.) beklenmedik bir problem yaşanması durumunda eski davranışa geri dönmek için uygulanacak adımlar aşağıda belirtilmiştir.

---

## ↩️ 1. Hızlı Geri Alma (Git Revert)

Faz 2A kapsamında sadece iki veri dosyası değiştirildiği için geri dönmek son derece kolaydır. Terminalde sırasıyla aşağıdaki komutları çalıştırmanız yeterlidir:

```bash
# Değiştirilen veri dosyalarını orijinal haline getirin:
git checkout -- assets/data/module-registry.json assets/data/source-registry.json
```

Bu komut çalıştırıldıktan sonra sistem **1 saniye içinde Faz 2A öncesindeki orijinal haline** geri dönecektir.

---

## ⚙️ 2. Geçici Devre Dışı Bırakma (Kill Switch)

Dosyaları revert etmeden sadece yeni eklenen 91 modül kaydını devre dışı bırakmak isterseniz:
1. `assets/data/module-registry.json` dosyasını açıp içeriğini `{ "modules": [] }` yapın.
2. Bu durumda, loader otomatik olarak eski glob tarama yöntemine (fallback) geri dönecek ve tüm modüller eski usulle çalışmaya devam edecektir.
