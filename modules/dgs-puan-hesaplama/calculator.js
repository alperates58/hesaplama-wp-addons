function hcDgsGetNet(dId, yId) {
    const d = parseInt(document.getElementById(dId).value) || 0;
    const y = parseInt(document.getElementById(yId).value) || 0;
    return Math.max(0, d - (y / 4));
}

function hcDgsHesapla() {
    const say = hcDgsGetNet('hc-dgs-say', 'hc-dgs-say-y');
    const soz = hcDgsGetNet('hc-dgs-soz', 'hc-dgs-soz-y');
    const obp = parseFloat(document.getElementById('hc-dgs-obp').value) || 0;

    const base = 135; // Tahmini taban puan

    const pSay = base + (say * 3.0) + (soz * 0.6) + (obp * 0.6);
    const pSoz = base + (say * 0.6) + (soz * 3.0) + (obp * 0.6);
    const pEa = base + (say * 1.8) + (soz * 1.8) + (obp * 0.6);

    document.getElementById('hc-dgs-res-say').innerText = pSay.toFixed(3);
    document.getElementById('hc-dgs-res-soz').innerText = pSoz.toFixed(3);
    document.getElementById('hc-dgs-res-ea').innerText = pEa.toFixed(3);

    document.getElementById('hc-dgs-result').classList.add('visible');
}
