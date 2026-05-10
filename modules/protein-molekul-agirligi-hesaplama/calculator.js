function hcProteinMwHesapla() {
    const seq = document.getElementById('hc-pmw-seq').value.toUpperCase().replace(/[^A-Z]/g, '');
    
    if (seq.length < 1) {
        alert('Lütfen amino asit dizisini giriniz.');
        return;
    }

    const aaWeights = {
        'A': 71.08, 'R': 156.19, 'N': 114.11, 'D': 115.09, 'C': 103.15,
        'E': 129.12, 'Q': 128.13, 'G': 57.05, 'H': 137.14, 'I': 113.16,
        'L': 113.16, 'K': 128.17, 'M': 131.19, 'F': 147.18, 'P': 97.12,
        'S': 87.08, 'T': 101.11, 'W': 186.21, 'Y': 163.18, 'V': 99.13
    };

    let totalMw = 18.02; // Su molekülü eklenir (zincir başı ve sonu)
    for (let char of seq) {
        if (aaWeights[char]) {
            totalMw += aaWeights[char];
        }
    }

    const resVal = document.getElementById('hc-pmw-res-val');
    const resKda = document.getElementById('hc-pmw-res-kDa');

    resVal.innerText = totalMw.toFixed(2).toLocaleString('tr-TR');
    resKda.innerText = "(" + (totalMw / 1000).toFixed(2) + " kDa)";

    document.getElementById('hc-protein-mw-result').classList.add('visible');
}
