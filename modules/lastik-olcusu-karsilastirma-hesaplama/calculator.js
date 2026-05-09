function hcTccGetDia(w, r, j) {
    return (w * r / 100 * 2) + (j * 25.4);
}

function hcTccHesapla() {
    const w1 = parseFloat(document.getElementById('hc-tcc-w1').value);
    const r1 = parseFloat(document.getElementById('hc-tcc-r1').value);
    const j1 = parseFloat(document.getElementById('hc-tcc-j1').value);
    
    const w2 = parseFloat(document.getElementById('hc-tcc-w2').value);
    const r2 = parseFloat(document.getElementById('hc-tcc-r2').value);
    const j2 = parseFloat(document.getElementById('hc-tcc-j2').value);

    if (isNaN(w1) || isNaN(w2)) {
        alert('Lütfen tüm ölçüleri girin.');
        return;
    }

    const dia1 = hcTccGetDia(w1, r1, j1);
    const dia2 = hcTccGetDia(w2, r2, j2);
    const diffPct = ((dia2 - dia1) / dia1) * 100;
    const speedAt100 = 100 * (dia2 / dia1);

    document.getElementById('hc-tcc-dia1').innerText = dia1.toFixed(1) + " mm";
    document.getElementById('hc-tcc-dia2').innerText = dia2.toFixed(1) + " mm";
    
    const pctEl = document.getElementById('hc-tcc-diff-pct');
    pctEl.innerText = (diffPct > 0 ? "+" : "") + diffPct.toFixed(2) + "%";
    pctEl.style.color = Math.abs(diffPct) <= 3 ? "green" : "red";

    const verdictEl = document.getElementById('hc-tcc-verdict');
    if (Math.abs(diffPct) <= 3) {
        verdictEl.innerText = "DEĞİŞİM UYGUNDUR";
        verdictEl.style.color = "green";
    } else {
        verdictEl.innerText = "DEĞİŞİM ÖNERİLMEZ (RİSKLİ)";
        verdictEl.style.color = "red";
    }

    document.getElementById('hc-tcc-speed').innerText = speedAt100.toFixed(1) + " km/h";
    document.getElementById('hc-tcc-result').classList.add('visible');
}
