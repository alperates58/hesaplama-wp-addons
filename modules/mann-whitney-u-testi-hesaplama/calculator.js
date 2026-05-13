function hcMannWhitneyUHesapla() {
    const group1Input = document.getElementById('hc-mw-group1').value;
    const group2Input = document.getElementById('hc-mw-group2').value;

    const parseData = (input) => input.split(/[,\s]+/).map(Number).filter(n => !isNaN(n));
    
    const g1 = parseData(group1Input);
    const g2 = parseData(group2Input);

    if (g1.length === 0 || g2.length === 0) {
        alert('Lütfen her iki grup için de geçerli veriler girin.');
        return;
    }

    const n1 = g1.length;
    const n2 = g2.length;

    // Rank all data
    const allData = [
        ...g1.map(val => ({ val, group: 1 })),
        ...g2.map(val => ({ val, group: 2 }))
    ].sort((a, b) => a.val - b.val);

    // Handle ties
    let i = 0;
    while (i < allData.length) {
        let j = i + 1;
        while (j < allData.length && allData[j].val === allData[i].val) {
            j++;
        }
        const rank = (i + 1 + j) / 2;
        for (let k = i; k < j; k++) {
            allData[k].rank = rank;
        }
        i = j;
    }

    const r1 = allData.filter(d => d.group === 1).reduce((acc, d) => acc + d.rank, 0);
    const r2 = allData.filter(d => d.group === 2).reduce((acc, d) => acc + d.rank, 0);

    const u1 = n1 * n2 + (n1 * (n1 + 1)) / 2 - r1;
    const u2 = n1 * n2 + (n2 * (n2 + 1)) / 2 - r2;
    const uStat = Math.min(u1, u2);

    // Z approximation (valid for n1, n2 > 20, but provided as reference)
    const mu = (n1 * n2) / 2;
    const sigma = Math.sqrt((n1 * n2 * (n1 + n2 + 1)) / 12);
    const z = (uStat - mu) / sigma;

    document.getElementById('hc-res-u1').innerText = u1.toLocaleString('tr-TR');
    document.getElementById('hc-res-u2').innerText = u2.toLocaleString('tr-TR');
    document.getElementById('hc-res-u-stat').innerText = uStat.toLocaleString('tr-TR');
    document.getElementById('hc-res-z').innerText = z.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-mw-note').innerText = (n1 < 20 || n2 < 20) 
        ? "Not: Örneklem sayısı küçük (n < 20) olduğu için U tablosu değerlerini kontrol etmeniz önerilir."
        : "Z değeri normal yaklaşım kullanılarak hesaplanmıştır.";

    document.getElementById('hc-mann-whitney-u-testi-result').classList.add('visible');
}
