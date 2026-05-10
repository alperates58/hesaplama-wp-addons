function hcWaterConsHesapla() {
    const people = parseFloat(document.getElementById('hc-wc-people').value);
    const avg = parseFloat(document.getElementById('hc-wc-avg').value);

    if (!people || !avg) {
        alert('Lütfen bilgileri giriniz.');
        return;
    }

    // Günlük Toplam Litre
    const dailyL = people * avg;
    // Aylık Toplam Litre
    const monthlyL = dailyL * 30;
    // m3 dönüşümü (1000 L = 1 m3)
    const monthlyM3 = monthlyL / 1000;

    const resVal = document.getElementById('hc-wc-res-val');
    resVal.innerText = monthlyM3.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-water-cons-result').classList.add('visible');
}
