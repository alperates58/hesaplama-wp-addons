function hcAVToggle() {
    const type = document.getElementById('hc-av-type').value;
    document.getElementById('hc-av-label').innerText = type === 'mol' ? 'Mol Sayısı' : 'Tanecik Sayısı';
}

function hcAVHesapla() {
    const type = document.getElementById('hc-av-type').value;
    const val = parseFloat(document.getElementById('hc-av-val').value);
    const Na = 6.02214076e23;

    if (isNaN(val)) {
        alert('Lütfen bir değer giriniz.');
        return;
    }

    let result = "";
    if (type === 'mol') {
        const count = val * Na;
        result = count.toExponential(4) + ' tanecik';
    } else {
        const mol = val / Na;
        result = mol.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' mol';
    }

    document.getElementById('hc-av-res-val').innerText = result;
    document.getElementById('hc-av-result').classList.add('visible');
}
