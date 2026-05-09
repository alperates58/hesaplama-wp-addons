function hcToggleMethod() {
    const method = document.getElementById('hc-cv-method').value;
    document.getElementById('hc-cv-multi-inputs').style.display = (method === 'multi') ? 'block' : 'none';
    document.getElementById('hc-cv-equity-inputs').style.display = (method === 'equity') ? 'block' : 'none';
}

function hcSirketDegeriHesapla() {
    const method = document.getElementById('hc-cv-method').value;
    let val = 0;

    if (method === 'multi') {
        const profit = parseFloat(document.getElementById('hc-cv-profit').value) || 0;
        const pe = parseFloat(document.getElementById('hc-cv-pe').value) || 0;
        val = profit * pe;
    } else {
        const assets = parseFloat(document.getElementById('hc-cv-assets').value) || 0;
        const liab = parseFloat(document.getElementById('hc-cv-liab').value) || 0;
        val = assets - liab;
    }

    document.getElementById('hc-cv-res-val').innerText = val.toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-comp-val-result').classList.add('visible');
}
