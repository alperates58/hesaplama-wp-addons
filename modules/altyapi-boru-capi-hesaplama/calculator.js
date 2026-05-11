function hcAltyapiBoruCapiHesapla() {
    const debiVal = parseFloat(document.getElementById('hc-ps-debi').value);
    const birim = document.getElementById('hc-ps-debi-birim').value;
    const v = parseFloat(document.getElementById('hc-ps-hiz').value);

    if (!debiVal || !v) {
        alert('Lütfen debi ve hız değerlerini giriniz.');
        return;
    }

    // m3/s cinsine çevir
    let Q = debiVal;
    if (birim === 'm3h') Q = debiVal / 3600;
    if (birim === 'ls') Q = debiVal / 1000;

    // D = sqrt( (4 * Q) / (pi * v) )
    const D_metre = Math.sqrt((4 * Q) / (Math.PI * v));
    const D_mm = D_metre * 1000;

    // Standart boru dış çapları (SDR11/17 PE100 vb. yaygın değerler)
    const standartCaplar = [20, 25, 32, 40, 50, 63, 75, 90, 110, 125, 140, 160, 200, 225, 250, 280, 315, 355, 400, 450, 500];
    let onerilen = standartCaplar.find(s => s >= D_mm);

    const sonucDiv = document.getElementById('hc-pipe-size-result');
    document.getElementById('hc-ps-res-val').innerText = D_mm.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' mm';
    document.getElementById('hc-ps-res-std').innerText = (onerilen ? onerilen + ' mm' : 'Özel İmalat');
    
    const noteDiv = document.getElementById('hc-ps-res-note');
    noteDiv.innerText = `Hesaplanan değer boru iç çapıdır. Seçilen boru et kalınlığına göre dış çap (DN) belirlenmelidir.`;

    sonucDiv.classList.add('visible');
}
