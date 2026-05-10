function hcPermHesapla() {
    const n = parseInt(document.getElementById('hc-p-n').value);
    const r = parseInt(document.getElementById('hc-p-r').value);

    if (isNaN(n) || isNaN(r) || n < 0 || r < 0 || r > n) {
        alert('Lütfen geçerli (n ≥ r ≥ 0) tam sayılar giriniz.');
        return;
    }

    if (n > 170) {
        alert('Sayı çok büyük. Lütfen 170 veya daha küçük bir n değeri giriniz.');
        return;
    }

    function factorial(num) {
        let res = 1;
        for (let i = 2; i <= num; i++) res *= i;
        return res;
    }

    // P(n,r) = n! / (n-r)!
    const perm = factorial(n) / factorial(n - r);

    document.getElementById('hc-p-res-val').innerText = perm.toLocaleString('tr-TR');
    document.getElementById('hc-perm-result').classList.add('visible');
}
