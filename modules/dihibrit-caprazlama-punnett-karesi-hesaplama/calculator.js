function hcDihibritHesapla() {
    const gametes = ['AB', 'Ab', 'aB', 'ab'];
    
    let html = '<table class="hc-punnett-table">';
    html += '<tr><th></th>' + gametes.map(g => `<th>${g}</th>`).join('') + '</tr>';
    
    const results = {};

    for (let g1 of gametes) {
        html += `<tr><th>${g1}</th>`;
        for (let g2 of gametes) {
            const genotype = combineGenotypes(g1, g2);
            html += `<td>${genotype}</td>`;
            
            const phenotype = getPhenotype(genotype);
            results[phenotype] = (results[phenotype] || 0) + 1;
        }
        html += '</tr>';
    }
    html += '</table>';
    
    document.getElementById('hc-punnett-table-container').innerHTML = html;
    
    let listHtml = '';
    const total = 16;
    for (let p in results) {
        listHtml += `<li><strong>${p}:</strong> ${results[p]}/${total} (%${(results[p]/total*100).toLocaleString('tr-TR', {maximumFractionDigits: 1})})</li>`;
    }
    document.getElementById('hc-phenotype-list').innerHTML = listHtml;
    
    document.getElementById('hc-dihibrit-result').classList.add('visible');
}

function combineGenotypes(g1, g2) {
    let a = [g1[0], g2[0]].sort().join('');
    let b = [g1[1], g2[1]].sort().join('');
    return a + b;
}

function getPhenotype(genotype) {
    let hasA = genotype.includes('A');
    let hasB = genotype.includes('B');
    
    if (hasA && hasB) return 'Baskın A, Baskın B';
    if (hasA && !hasB) return 'Baskın A, Çekinik b';
    if (!hasA && hasB) return 'Çekinik a, Baskın B';
    return 'Çekinik a, Çekinik b';
}
