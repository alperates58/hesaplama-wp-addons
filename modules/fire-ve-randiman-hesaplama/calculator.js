function hcRandimanHesapla() {
    const input = parseFloat(document.getElementById('hc-fr-input').value);
    const output = parseFloat(document.getElementById('hc-fr-output').value);

    if (isNaN(input) || isNaN(output) || input <= 0) {
        alert('Lütfen geçerli giriş ve çıkış miktarları girin.');
        return;
    }

    if (output > input) {
        alert('Çıkış miktarı giriş miktarından büyük olamaz.');
        return;
    }

    const loss = input - output;
    const yieldPerc = (output / input) * 100;
    const lossPerc = (loss / input) * 100;

    document.getElementById('hc-fr-res-yield').innerText = '%' + yieldPerc.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-fr-res-loss').innerText = '%' + lossPerc.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-fr-res-desc').innerText = 'Toplam Fire Miktarı: ' + loss.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-fr-result').classList.add('visible');
}
