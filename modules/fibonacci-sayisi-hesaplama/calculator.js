function hcFibonacciHesapla() {
    const n = parseInt(document.getElementById('hc-fb-n').value);

    if (isNaN(n) || n < 1) {
        alert('Lütfen 1 veya daha büyük bir tam sayı giriniz.');
        return;
    }

    if (n > 1000) {
        alert('Lütfen 1000 veya daha küçük bir sayı giriniz.');
        return;
    }

    let fib = [0, 1];
    for (let i = 2; i <= n; i++) {
        // Using BigInt for larger numbers if needed, but for display simplicity:
        fib[i] = fib[i - 1] + fib[i - 2];
    }

    const resVal = document.getElementById('hc-fb-res-val');
    const lastTerm = fib[n];
    
    if (lastTerm > 1e15) {
        resVal.innerText = lastTerm.toExponential(4);
    } else {
        resVal.innerText = lastTerm.toLocaleString('tr-TR');
    }

    document.getElementById('hc-fb-res-seq').innerText = fib.slice(0, n + 1).join(', ');

    document.getElementById('hc-fibonacci-result').classList.add('visible');
}
