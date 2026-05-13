function hcFisherExactHesapla() {
    const a = parseInt(document.getElementById('hc-fisher-a').value);
    const b = parseInt(document.getElementById('hc-fisher-b').value);
    const c = parseInt(document.getElementById('hc-fisher-c').value);
    const d = parseInt(document.getElementById('hc-fisher-d').value);

    if (isNaN(a) || isNaN(b) || isNaN(c) || isNaN(d) || a < 0 || b < 0 || c < 0 || d < 0) {
        alert('Lütfen geçerli pozitif tam sayılar girin.');
        return;
    }

    const n = a + b + c + d;
    if (n === 0) return;

    function logFactorial(num) {
        let res = 0;
        for (let i = 2; i <= num; i++) res += Math.log(i);
        return res;
    }

    // Fisher's formula: p = (a+b)!(c+d)!(a+c)!(b+d)! / (a!b!c!d!n!)
    const logP = (logFactorial(a + b) + logFactorial(c + d) + logFactorial(a + c) + logFactorial(b + d)) -
                 (logFactorial(a) + logFactorial(b) + logFactorial(c) + logFactorial(d) + logFactorial(n));

    const pValue = Math.exp(logP);
    
    document.getElementById('hc-res-fisher-p').innerText = pValue.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    
    let desc = "";
    if (pValue < 0.05) {
        desc = "İstatistiksel olarak anlamlı (p < 0.05). Değişkenler arasında ilişki vardır.";
    } else {
        desc = "İstatistiksel olarak anlamlı değil (p >= 0.05). Değişkenler bağımsız kabul edilebilir.";
    }

    document.getElementById('hc-fisher-desc').innerText = desc;
    document.getElementById('hc-fisher-kesin-testi-result').classList.add('visible');
}
