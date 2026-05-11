function hcReelGetiriHesapla() {
    const nominal = parseFloat(document.getElementById('hc-rg-nominal').value) / 100;
    const inflation = parseFloat(document.getElementById('hc-rg-inflation').value) / 100;

    if (isNaN(nominal) || isNaN(inflation)) {
        alert('Lütfen geçerli oranlar girin.');
        return;
    }

    const reel = ((1 + nominal) / (1 + inflation) - 1) * 100;

    document.getElementById('hc-rg-res-total').innerText = '%' + reel.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    
    const resElem = document.getElementById('hc-rg-res-total');
    resElem.style.color = reel >= 0 ? 'green' : 'red';

    document.getElementById('hc-rg-result').classList.add('visible');
}
