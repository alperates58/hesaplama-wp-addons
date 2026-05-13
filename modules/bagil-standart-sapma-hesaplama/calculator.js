function hcRSDHesapla() {
    const mean = parseFloat(document.getElementById('hc-rsd-mean').value);
    const sd = parseFloat(document.getElementById('hc-rsd-sd').value);

    if (isNaN(mean) || isNaN(sd) || mean === 0) {
        alert('Lütfen geçerli değerler girin (Ortalama 0 olamaz).');
        return;
    }

    const rsd = (Math.abs(sd) / Math.abs(mean)) * 100;

    document.getElementById('hc-res-rsd-val').innerText = '%' + rsd.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    document.getElementById('hc-bagil-standart-sapma-hesaplama-result').classList.add('visible');
}
