function hcDLIHesapla() {
    const ppfd = parseFloat(document.getElementById('hc-dli-ppfd').value);
    const hours = parseFloat(document.getElementById('hc-dli-hours').value);

    if (isNaN(ppfd) || isNaN(hours) || ppfd <= 0 || hours <= 0 || hours > 24) {
        alert('Lütfen geçerli değerler giriniz (Süre 24 saatten fazla olamaz).');
        return;
    }

    // DLI = (PPFD * hours * 3600) / 1,000,000
    const dli = (ppfd * hours * 3600) / 1000000;

    document.getElementById('hc-dli-val').innerText = dli.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mol/m²/gün';
    
    let note = "";
    if (dli < 10) note = "Düşük ışık seviyesi (gölge bitkileri için uygun).";
    else if (dli <= 20) note = "Orta ışık seviyesi.";
    else note = "Yüksek ışık seviyesi (tam güneş bitkileri için ideal).";

    document.getElementById('hc-dli-note').innerText = note;
    document.getElementById('hc-dli-result').classList.add('visible');
}
