function hcFactorialHesapla() {
    const n = parseInt(document.getElementById('hc-fac-num').value);

    if (isNaN(n) || n < 0) {
        alert('Lütfen 0 veya daha büyük bir tam sayı giriniz.');
        return;
    }

    if (n > 170) {
        alert('Sayı çok büyük. Lütfen 170 veya daha küçük bir sayı giriniz.');
        return;
    }

    let result = 1;
    for (let i = 2; i <= n; i++) {
        result *= i;
    }

    const resVal = document.getElementById('hc-fac-res-val');
    if (result > 1e15) {
        resVal.innerText = result.toExponential(4);
    } else {
        resVal.innerText = result.toLocaleString('tr-TR');
    }

    document.getElementById('hc-factorial-result').classList.add('visible');
}
