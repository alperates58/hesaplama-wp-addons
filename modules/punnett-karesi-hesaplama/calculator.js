function hcPunnettHesapla() {
    const p1 = document.getElementById('hc-pk-p1').value;
    const p2 = document.getElementById('hc-pk-p2').value;

    if (p1.length !== 2 || p2.length !== 2) {
        alert('Lütfen iki harfli genotipler giriniz (Örn: Aa).');
        return;
    }

    const alleles1 = [p1[0], p1[1]];
    const alleles2 = [p2[0], p2[1]];
    
    const results = [];
    alleles1.forEach(a1 => {
        alleles2.forEach(a2 => {
            // Harfleri sırala (Büyük harf önce gelsin)
            const genotype = [a1, a2].sort().join('');
            results.push(genotype);
        });
    });

    // Tabloyu oluştur
    let html = `
        <tr><td></td><th>${alleles2[0]}</th><th>${alleles2[1]}</th></tr>
        <tr><th>${alleles1[0]}</th><td>${results[0]}</td><td>${results[1]}</td></tr>
        <tr><th>${alleles1[1]}</th><td>${results[2]}</td><td>${results[3]}</td></tr>
    `;
    document.getElementById('hc-pk-table').innerHTML = html;

    // Özet hesapla
    const counts = {};
    results.forEach(g => counts[g] = (counts[g] || 0) + 1);
    
    let summary = "<strong>Genotip Oranları:</strong><br>";
    for (let g in counts) {
        summary += `${g}: %${(counts[g]/4)*100}<br>`;
    }

    document.getElementById('hc-pk-summary').innerHTML = summary;
    document.getElementById('hc-punnett-result').classList.add('visible');
}
