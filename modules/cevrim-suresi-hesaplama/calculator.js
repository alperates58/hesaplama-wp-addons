function hcCycleTimeHesapla() {
    const sure = parseFloat(document.getElementById('hc-cs-sure').value);
    const miktar = parseFloat(document.getElementById('hc-cs-miktar').value);

    if (isNaN(sure) || isNaN(miktar) || miktar <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // CT = Sure / Miktar
    const ctDakika = sure / miktar;
    const ctSaniye = ctDakika * 60;

    document.getElementById('hc-cs-res-val').innerText = ctDakika.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dk/adet';
    document.getElementById('hc-cs-res-sec').innerText = 'Birim başına: ' + ctSaniye.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' saniye';
    
    document.getElementById('hc-cs-result').classList.add('visible');
}
