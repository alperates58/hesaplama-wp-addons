function hcPEGHesapla() {
    const pe = parseFloat(document.getElementById('hc-pg-pe').value) || 0;
    const growth = parseFloat(document.getElementById('hc-pg-growth').value) || 0;

    if (growth === 0) {
        alert('Büyüme oranı sıfır olamaz.');
        return;
    }

    const peg = pe / growth;

    document.getElementById('hc-pg-res-val').innerText = peg.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    const interp = document.getElementById('hc-pg-interpretation');
    if (peg < 1) {
        interp.innerText = "İskontolu (Ucuz)";
        interp.style.color = "#27ae60";
    } else if (peg < 1.5) {
        interp.innerText = "Adil Değer";
        interp.style.color = "#f39c12";
    } else {
        interp.innerText = "Primli (Pahalı)";
        interp.style.color = "#c0392b";
    }

    document.getElementById('hc-peg-result').classList.add('visible');
}
