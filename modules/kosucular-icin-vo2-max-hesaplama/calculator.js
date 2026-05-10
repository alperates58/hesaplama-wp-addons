function hcVo2MaxRunnerHesapla() {
    const dist = parseFloat(document.getElementById('hc-vo-dist').value);

    if (!dist) {
        alert('Lütfen koşulan mesafeyi metre cinsinden giriniz.');
        return;
    }

    // Cooper Test Formula: VO2max = (distance_in_meters - 504.9) / 44.73
    const vo2max = (dist - 504.9) / 44.73;

    const resVal = document.getElementById('hc-vo-res-val');
    resVal.innerText = vo2max.toFixed(2).toLocaleString('tr-TR');

    const resDesc = document.getElementById('hc-vo-res-desc');
    if (vo2max < 30) {
        resDesc.innerText = "Çok Zayıf: Kondisyon seviyeniz oldukça düşük.";
        resDesc.style.color = "#e74c3c";
    } else if (vo2max <= 40) {
        resDesc.innerText = "Orta: Geliştirilmesi gereken bir kondisyon seviyesi.";
        resDesc.style.color = "#f1c40f";
    } else if (vo2max <= 50) {
        resDesc.innerText = "İyi: Düzenli spor yapan bir birey seviyesi.";
        resDesc.style.color = "#27ae60";
    } else {
        resDesc.innerText = "Mükemmel: Üst düzey atletik performans!";
        resDesc.style.color = "#2980b9";
    }

    document.getElementById('hc-vo2max-runner-result').classList.add('visible');
}
