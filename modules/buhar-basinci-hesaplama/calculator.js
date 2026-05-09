const hcBBData = {
    water: { a: 8.07131, b: 1730.63, c: 233.426 },
    ethanol: { a: 8.20417, b: 1642.89, c: 230.3 },
    acetone: { a: 7.02447, b: 1161.0, c: 224.0 },
    benzene: { a: 6.90565, b: 1211.033, c: 220.79 }
};

function hcBBUpdateConstants() {
    const sub = document.getElementById('hc-bb-sub').value;
    const customDiv = document.getElementById('hc-bb-custom-params');
    if (sub === 'custom') {
        customDiv.style.display = 'block';
    } else {
        customDiv.style.display = 'none';
        document.getElementById('hc-bb-a').value = hcBBData[sub].a;
        document.getElementById('hc-bb-b').value = hcBBData[sub].b;
        document.getElementById('hc-bb-c').value = hcBBData[sub].c;
    }
}

// Initial update
window.addEventListener('DOMContentLoaded', hcBBUpdateConstants);

function hcBBHesapla() {
    const t = parseFloat(document.getElementById('hc-bb-t').value);
    const a = parseFloat(document.getElementById('hc-bb-a').value);
    const b = parseFloat(document.getElementById('hc-bb-b').value);
    const c = parseFloat(document.getElementById('hc-bb-c').value);

    if (isNaN(t) || isNaN(a) || isNaN(b) || isNaN(c)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // log10(P) = A - (B / (C + T))
    const logP = a - (b / (c + t));
    const pMmhg = Math.pow(10, logP);

    document.getElementById('hc-bb-val').innerText = pMmhg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mmHg';
    document.getElementById('hc-bb-result').classList.add('visible');
}
