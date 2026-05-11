function hcMlssHesapla() {
    const vol = parseFloat(document.getElementById('hc-ml-vol').value); // mL
    const total_mg = parseFloat(document.getElementById('hc-ml-total').value); // mg
    const volatile_mg = parseFloat(document.getElementById('hc-ml-volatile').value); // mg

    if (isNaN(vol) || isNaN(total_mg) || isNaN(volatile_mg) || vol <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (volatile_mg > total_mg) {
        alert('Uçucu madde kütlesi toplam katı maddeden büyük olamaz.');
        return;
    }

    // Concentration (mg/L) = (mg / mL) * 1000
    const mlss = (total_mg / vol) * 1000;
    const mlvss = (volatile_mg / vol) * 1000;
    const ratio = mlvss / mlss;

    document.getElementById('hc-ml-res-mlss').innerText = Math.round(mlss).toLocaleString('tr-TR');
    document.getElementById('hc-ml-res-mlvss').innerText = Math.round(mlvss).toLocaleString('tr-TR');
    document.getElementById('hc-ml-res-ratio').innerText = '%' + (ratio * 100).toLocaleString('tr-TR', { maximumFractionDigits: 1 });

    document.getElementById('hc-ml-result').classList.add('visible');
}
