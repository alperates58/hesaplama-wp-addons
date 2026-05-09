function hcCFUHesapla() {
    const colonies = parseFloat(document.getElementById('hc-cfu-colonies').value);
    const dilution = parseFloat(document.getElementById('hc-cfu-dilution').value);
    const vol = parseFloat(document.getElementById('hc-cfu-vol').value);

    if (isNaN(colonies) || isNaN(dilution) || isNaN(vol) || colonies < 0 || dilution < 1 || vol <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const cfuPerMl = (colonies * dilution) / vol;

    document.getElementById('hc-cfu-val').innerText = cfuPerMl.toExponential(3) + ' CFU/mL';
    document.getElementById('hc-cfu-note').innerText = `Orijinal örnekte mililitre başına yaklaşık ${cfuPerMl.toLocaleString('tr-TR')} koloni oluşturan birim bulunmaktadır.`;
    document.getElementById('hc-cfu-result').classList.add('visible');
}
