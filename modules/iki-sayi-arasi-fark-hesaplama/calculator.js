function hcNumDiffHesapla() {
    const s1 = parseFloat(document.getElementById('hc-df-s1').value);
    const s2 = parseFloat(document.getElementById('hc-df-s2').value);

    if (isNaN(s1) || isNaN(s2)) {
        alert('Lütfen her iki sayıyı da giriniz.');
        return;
    }

    const diff = s2 - s1;
    const absDiff = Math.abs(diff);

    document.getElementById('hc-df-res-val').innerText = absDiff.toLocaleString('tr-TR');
    
    let msg = "";
    if (diff > 0) msg = "2. sayı, 1. sayıdan daha büyük.";
    else if (diff < 0) msg = "2. sayı, 1. sayıdan daha küçük.";
    else msg = "İki sayı birbirine eşit.";
    
    document.getElementById('hc-df-res-msg').innerText = msg;
    document.getElementById('hc-diff-result').classList.add('visible');
}
