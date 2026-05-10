function hcPcHesapla() {
    const n = parseInt(document.getElementById('hc-pc-n').value);
    const r = parseInt(document.getElementById('hc-pc-r').value);

    if (isNaN(n) || isNaN(r) || n < 0 || r < 0 || r > n) {
        alert('Lütfen geçerli (n ≥ r ≥ 0) değerler giriniz.');
        return;
    }

    function factorial(num) {
        let res = 1;
        for (let i = 2; i <= num; i++) res *= i;
        return res;
    }

    const perm = factorial(n) / factorial(n - r);
    const comb = perm / factorial(r);

    document.getElementById('hc-pc-perm').innerText = perm.toLocaleString('tr-TR');
    document.getElementById('hc-pc-comb').innerText = comb.toLocaleString('tr-TR');
    document.getElementById('hc-pc-result').classList.add('visible');
}
