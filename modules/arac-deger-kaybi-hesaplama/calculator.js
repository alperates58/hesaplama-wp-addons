function hcDkHesapla() {
    const value = parseFloat(document.getElementById('hc-dk-value').value);
    const km = parseFloat(document.getElementById('hc-dk-km').value);
    const partMultiplier = parseFloat(document.getElementById('hc-dk-part').value);

    if (isNaN(value) || isNaN(km)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (km >= 165000) {
        document.getElementById('hc-dk-val').innerText = "0 ₺";
        alert('165.000 km üzerindeki araçlar için yasal değer kaybı oluşmamaktadır.');
    } else {
        const kmFactor = (165000 - km) / 165000;
        const loss = value * partMultiplier * kmFactor;
        document.getElementById('hc-dk-val').innerText = loss.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + " ₺";
    }

    document.getElementById('hc-dk-result').classList.add('visible');
}
