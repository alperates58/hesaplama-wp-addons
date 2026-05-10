function hcRnaMwHesapla() {
    const seq = document.getElementById('hc-rmw-seq').value.toUpperCase().replace(/[^AUGC]/g, '');
    
    if (seq.length < 1) {
        alert('Lütfen RNA dizisini giriniz.');
        return;
    }

    // Average RNA nucleotide weights (g/mol)
    const weights = { 'A': 329.2, 'U': 306.2, 'G': 345.2, 'C': 305.2 };
    
    let totalMw = 159.0; // 5' triphosphate end approximation
    for (let char of seq) {
        if (weights[char]) {
            totalMw += weights[char];
        }
    }

    const resVal = document.getElementById('hc-rmw-res-val');
    resVal.innerText = totalMw.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-rna-mw-result').classList.add('visible');
}
