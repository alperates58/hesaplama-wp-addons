function hcGenetikUzaklikHesapla() {
    let s1 = document.getElementById('hc-gd-seq1').value.toUpperCase().replace(/[^ATCG]/g, '');
    let s2 = document.getElementById('hc-gd-seq2').value.toUpperCase().replace(/[^ATCG]/g, '');

    if (s1.length === 0 || s2.length === 0) {
        alert('Lütfen her iki diziyi de giriniz.');
        return;
    }

    if (s1.length !== s2.length) {
        alert('Dizilerin uzunlukları eşit olmalıdır.');
        return;
    }

    let diffs = 0;
    for (let i = 0; i < s1.length; i++) {
        if (s1[i] !== s2[i]) diffs++;
    }

    const distance = diffs / s1.length;

    document.getElementById('hc-gd-val').innerText = distance.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-gd-note').innerText = `Toplam ${s1.length} baz içinden ${diffs} adet farklılık tespit edildi. Benzerlik oranı: %${((1 - distance) * 100).toLocaleString('tr-TR', { maximumFractionDigits: 1 })}`;
    
    document.getElementById('hc-gd-result').classList.add('visible');
}
