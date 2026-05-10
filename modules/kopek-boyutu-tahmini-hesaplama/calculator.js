function hcKopekBoyutHesapla() {
    const currentWeight = parseFloat(document.getElementById('hc-kbt-weight').value);
    const ageWeeks = parseInt(document.getElementById('hc-kbt-age').value);
    const adultWeeks = parseInt(document.getElementById('hc-kbt-size').value);

    if (!currentWeight || !ageWeeks) {
        alert('Lütfen ağırlık ve yaş bilgilerini giriniz.');
        return;
    }

    // Basit yetişkin ağırlık tahmini formülü: (Mevcut Ağırlık / Mevcut Hafta) * Yetişkinliğe kadar geçen hafta
    // Not: Bu doğrusal bir tahmin olup, büyük ırklarda büyüme eğrisi farklılık gösterir.
    const adultWeight = (currentWeight / ageWeeks) * adultWeeks;

    const resVal = document.getElementById('hc-kbt-res-val');
    resVal.innerText = adultWeight.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-kopek-boyut-result').classList.add('visible');
}
