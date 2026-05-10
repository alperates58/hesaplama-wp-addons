function hcPrimerTmHesapla() {
    let seq = document.getElementById('hc-pt-seq').value.toUpperCase().replace(/[^ATGC]/g, '');
    
    if (seq.length < 1) {
        alert('Lütfen geçerli bir baz dizisi giriniz.');
        return;
    }

    let a = 0, t = 0, g = 0, c = 0;
    for (let char of seq) {
        if (char === 'A') a++;
        else if (char === 'T') t++;
        else if (char === 'G') g++;
        else if (char === 'C') c++;
    }

    // Wallace-Itakura Formula (for 14-20 bp)
    // Tm = 2(A+T) + 4(G+C)
    const tm = 2 * (a + t) + 4 * (g + c);

    const resVal = document.getElementById('hc-pt-res-val');
    resVal.innerText = tm.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-primer-tm-result').classList.add('visible');
}
