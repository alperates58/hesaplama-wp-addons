function hcRSEHesapla() {
    const mean = parseFloat(document.getElementById('hc-rse-mean').value);
    const sd = parseFloat(document.getElementById('hc-rse-sd').value);
    const n = parseInt(document.getElementById('hc-rse-n').value);

    if (isNaN(mean) || isNaN(sd) || isNaN(n) || n <= 0 || mean === 0) {
        alert('Lütfen geçerli değerler girin (n > 0 ve Ortalama 0 olamaz).');
        return;
    }

    const se = sd / Math.sqrt(n);
    const rse = (Math.abs(se) / Math.abs(mean)) * 100;

    const fmt = (val) => val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 6 });

    document.getElementById('hc-res-se-val').innerText = fmt(se);
    document.getElementById('hc-res-rse-val').innerText = '%' + fmt(rse);
    document.getElementById('hc-bagil-standart-hata-hesaplama-result').classList.add('visible');
}
