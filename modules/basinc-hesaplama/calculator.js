function hcBasincHesapla() {
    const f = parseFloat(document.getElementById('hc-bas-f').value);
    const a = parseFloat(document.getElementById('hc-bas-a').value);

    if (isNaN(f) || isNaN(a) || a <= 0) {
        alert('Lütfen geçerli değerler girin (Alan 0\'dan büyük olmalıdır).');
        return;
    }

    const pPa = f / a;
    const pBar = pPa / 100000;
    const pPsi = pPa / 6894.76;

    document.getElementById('hc-bas-res-pa').innerText = Math.round(pPa).toLocaleString('tr-TR') + ' Pa';
    document.getElementById('hc-bas-res-bar').innerText = pBar.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' bar';
    document.getElementById('hc-bas-res-psi').innerText = pPsi.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' PSI';
    
    document.getElementById('hc-bas-result').classList.add('visible');
}
