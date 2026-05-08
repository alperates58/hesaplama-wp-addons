function hcFAVOKCarpaniHesapla() {
    const ev = parseFloat(document.getElementById('hc-ec-ev').value) || 0;
    const ebitda = parseFloat(document.getElementById('hc-ec-ebitda').value) || 0;

    if (ebitda === 0) {
        alert('FAVÖK sıfır olamaz.');
        return;
    }

    const multiple = ev / ebitda;

    document.getElementById('hc-ec-res-val').innerText = multiple.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' x';

    document.getElementById('hc-ev-ebitda-result').classList.add('visible');
}
