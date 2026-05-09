function hcArdisikToplamHesapla() {
    const a1 = parseInt(document.getElementById('hc-ss-start').value);
    const an = parseInt(document.getElementById('hc-ss-end').value);
    const d = parseInt(document.getElementById('hc-ss-inc').value);

    if (isNaN(a1) || isNaN(an) || isNaN(d)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (d === 0) {
        alert('Artış miktarı 0 olamaz.');
        return;
    }

    if ((an - a1) % d !== 0) {
        alert('Son terim, ilk terim ve artış miktarına uygun değil.');
        return;
    }

    // Term count: n = ((an - a1) / d) + 1
    const n = ((an - a1) / d) + 1;
    
    if (n <= 0) {
        alert('Geçersiz dizi parametreleri.');
        return;
    }

    // Sum: S = n * (a1 + an) / 2
    const sum = (n * (a1 + an)) / 2;

    document.getElementById('hc-res-ss-n').innerText = n.toLocaleString('tr-TR');
    document.getElementById('hc-res-ss-sum').innerText = sum.toLocaleString('tr-TR');

    document.getElementById('hc-ss-result').classList.add('visible');
}
