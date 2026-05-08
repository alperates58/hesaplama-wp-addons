function hcAlesGetNet(dId, yId) {
    const d = parseInt(document.getElementById(dId).value) || 0;
    const y = parseInt(document.getElementById(yId).value) || 0;
    return Math.max(0, d - (y / 4));
}

function hcAlesHesapla() {
    const say = hcAlesGetNet('hc-ales-say', 'hc-ales-say-y');
    const soz = hcAlesGetNet('hc-ales-soz', 'hc-ales-soz-y');

    if (say === 0 && soz === 0) {
        alert('Her iki testten de en az 1 net yapmanız önerilir.');
    }

    const base = 50; // Tahmini taban puan

    const pSay = base + (say * 0.82) + (soz * 0.18);
    const pSoz = base + (say * 0.18) + (soz * 0.82);
    const pEa = base + (say * 0.5) + (soz * 0.5);

    document.getElementById('hc-ales-res-say').innerText = Math.min(100, pSay).toFixed(3);
    document.getElementById('hc-ales-res-soz').innerText = Math.min(100, pSoz).toFixed(3);
    document.getElementById('hc-ales-res-ea').innerText = Math.min(100, pEa).toFixed(3);

    document.getElementById('hc-ales-result').classList.add('visible');
}
