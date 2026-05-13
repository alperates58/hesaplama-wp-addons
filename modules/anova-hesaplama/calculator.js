function hcAnovaHesapla() {
    const parse = (id) => document.getElementById(id).value.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n));
    
    const g1 = parse('hc-anova-g1');
    const g2 = parse('hc-anova-g2');
    const g3 = parse('hc-anova-g3');

    if (g1.length < 2 || g2.length < 2 || g3.length < 2) {
        alert('Lütfen her grup için en az 2 sayı girin.');
        return;
    }

    const groups = [g1, g2, g3];
    const k = groups.length;
    const nTotal = g1.length + g2.length + g3.length;

    const means = groups.map(g => g.reduce((a, b) => a + b, 0) / g.length);
    const grandMean = groups.flat().reduce((a, b) => a + b, 0) / nTotal;

    // SS Between
    let ssBetween = 0;
    groups.forEach((g, i) => {
        ssBetween += g.length * Math.pow(means[i] - grandMean, 2);
    });

    // SS Within (Residual)
    let ssWithin = 0;
    groups.forEach((g, i) => {
        g.forEach(x => {
            ssWithin += Math.pow(x - means[i], 2);
        });
    });

    const dfBetween = k - 1;
    const dfWithin = nTotal - k;
    const msBetween = ssBetween / dfBetween;
    const msWithin = ssWithin / dfWithin;
    const fVal = msBetween / msWithin;

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    const tbody = document.getElementById('hc-anova-tbody');
    tbody.innerHTML = `
        <tr><td>Gruplar Arası</td><td>${fmt(ssBetween)}</td><td>${dfBetween}</td><td>${fmt(msBetween)}</td><td>${fmt(fVal)}</td></tr>
        <tr><td>Grup İçi (Hata)</td><td>${fmt(ssWithin)}</td><td>${dfWithin}</td><td>${fmt(msWithin)}</td><td>-</td></tr>
        <tr><td>Toplam</td><td>${fmt(ssBetween + ssWithin)}</td><td>${nTotal - 1}</td><td>-</td><td>-</td></tr>
    `;

    document.getElementById('hc-anova-res-text').innerText = fVal > 1 ? "Gruplar arasında fark olabilir (F testi anlamlılık kontrolü gerek)." : "Gruplar arası fark belirgin değil.";
    document.getElementById('hc-anova-hesaplama-result').classList.add('visible');
}
